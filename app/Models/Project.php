<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'user_id',
        'one_line_description',
        'tech_used',
        'description',
        'image_path',
        'project_file_path',
        'project_link',
        'creator_name',
        'company_name',
        'creator_profile_pic',
        'category',
        'price',
        'rating',
        'status',
        'language',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
    ];

    public function imagePaths(): array
    {
        $paths = json_decode($this->image_path ?? '', true);

        if (is_array($paths)) {
            return array_values(array_filter($paths));
        }

        return $this->image_path ? [$this->image_path] : [];
    }

    public function imageUrl(): string
    {
        $path = $this->imagePaths()[0] ?? null;

        if ($path && str_starts_with($path, 'http')) {
            return $path;
        }

        if ($path && str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        if ($path && Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }

        return match ($this->category) {
            'Website' => asset('assets/img/portfolio/product-1.jpg'),
            'Theme' => asset('assets/img/portfolio/branding-1.jpg'),
            'UI UX' => asset('assets/img/portfolio/books-1.jpg'),
            default => asset('assets/img/portfolio/app-1.jpg'),
        };
    }

    public function imageUrls(): array
    {
        $urls = collect($this->imagePaths())
            ->map(function ($path) {
                if (str_starts_with($path, 'http')) {
                    return $path;
                }

                if (str_starts_with($path, 'assets/')) {
                    return asset($path);
                }

                return Storage::disk('public')->exists($path) ? asset('storage/' . $path) : null;
            })
            ->filter()
            ->values()
            ->all();

        return $urls ?: [$this->imageUrl()];
    }

    public function creatorProfileUrl(): ?string
    {
        return $this->creator_profile_pic ? asset('storage/' . $this->creator_profile_pic) : null;
    }

    public function priceLabel(): string
    {
        return $this->status === 'free' ? 'Free' : '$' . number_format((float) $this->price, 2);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function videos()
    {
        return $this->hasMany(ProjectVideo::class)->orderBy('sort_order');
    }

    public function purchases()
    {
        return $this->hasMany(ProjectPurchase::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProjectReview::class)->latest();
    }

    public function isOwnedBy(?User $user): bool
    {
        return $user && $this->user_id && (int) $this->user_id === (int) $user->id;
    }

    public function hasVideos(): bool
    {
        return $this->relationLoaded('videos') ? $this->videos->isNotEmpty() : $this->videos()->exists();
    }

    public function ratingValue(): float
    {
        $average = $this->reviews()->avg('rating');

        return $average !== null ? (float) $average : (float) $this->rating;
    }

    public function reviewCount(): int
    {
        return $this->reviews()->count();
    }
}

