<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $categories = ['App', 'Website', 'Theme', 'UI UX'];
        $languages = ['PHP', 'Python', 'JavaScript', 'Laravel'];
        $statuses = ['free' => 'Free', 'paid' => 'Paid'];
        $sortOptions = [
            'latest' => 'Latest',
            'oldest' => 'Oldest',
            'price_low' => 'Price: Low to High',
            'price_high' => 'Price: High to Low',
            'rating_high' => 'Top Rated',
            'title_az' => 'Title: A to Z',
        ];

        $projectsQuery = Project::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->toString();

                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when(in_array($request->category, $categories, true), function ($query) use ($request) {
                $query->where('category', $request->category);
            })
            ->when(array_key_exists($request->status, $statuses), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when(in_array($request->language, $languages, true), function ($query) use ($request) {
                $query->where('language', $request->language);
            });

        match ($request->get('sort', 'latest')) {
            'oldest' => $projectsQuery->oldest(),
            'price_low' => $projectsQuery->orderBy('price'),
            'price_high' => $projectsQuery->orderByDesc('price'),
            'rating_high' => $projectsQuery->orderByDesc('rating'),
            'title_az' => $projectsQuery->orderBy('title'),
            default => $projectsQuery->latest(),
        };

        $projects = $projectsQuery->with('videos')->paginate(9)->withQueryString();

        return view('panel.pages.all-projects', compact('projects', 'categories', 'languages', 'statuses', 'sortOptions'));
    }

    public function create()
    {
        return view('panel.pages.add-project-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'one_line_description' => 'nullable|string|max:255',
            'tech_used' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'videos' => 'nullable|array',
            'videos.*' => 'file|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:102400',
            'project_file' => 'nullable|file|max:51200',
            'project_link' => 'nullable|url|max:2048',
            'creator_name' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'creator_profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string|in:App,Website,Theme,UI UX',
            'price' => 'required_if:status,paid|nullable|numeric|min:0.01',
            'rating' => 'nullable|numeric|min:0|max:5',
            'status' => 'required|string|in:free,paid',
            'language' => 'nullable|string|in:PHP,Python,JavaScript,Laravel',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('project_images', 'public');
            }
        }

        $videoPaths = [];
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $videoPaths[] = $video->store('project_videos', 'public');
            }
        }

        $projectFilePath = null;
        if ($request->hasFile('project_file')) {
            $projectFilePath = $request->file('project_file')->store('project_files', 'public');
        }

        $creatorProfilePicPath = null;
        if ($request->hasFile('creator_profile_pic')) {
            $creatorProfilePicPath = $request->file('creator_profile_pic')->store('creator_profiles', 'public');
        }

        $project = Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'one_line_description' => $request->one_line_description,
            'tech_used' => $request->tech_used,
            'description' => $request->description,
            'image_path' => $imagePaths ? json_encode($imagePaths) : null,
            'project_file_path' => $projectFilePath,
            'project_link' => $request->project_link,
            'creator_name' => $request->creator_name,
            'company_name' => $request->company_name,
            'creator_profile_pic' => $creatorProfilePicPath,
            'category' => $request->category,
            'price' => $request->status === 'paid' ? $request->price : 0.00,
            'rating' => $request->rating ?? 0.0,
            'status' => $request->status,
            'language' => $request->language,
        ]);

        foreach ($videoPaths as $index => $path) {
            $project->videos()->create([
                'title' => 'Video ' . ($index + 1),
                'path' => $path,
                'sort_order' => $index + 1,
            ]);
        }

        return redirect()->route('panel.pages.project-details', $project)->with('success', 'Project added successfully!');
    }

    public function edit(Project $project)
    {
        abort_unless($project->isOwnedBy(Auth::user()), 403);

        return view('panel.pages.add-project-form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        abort_unless($project->isOwnedBy(Auth::user()), 403);

        $request->validate([
            'title' => 'required|string|max:255',
            'one_line_description' => 'nullable|string|max:255',
            'tech_used' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'videos' => 'nullable|array',
            'videos.*' => 'file|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:102400',
            'project_file' => 'nullable|file|max:51200',
            'project_link' => 'nullable|url|max:2048',
            'creator_name' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'creator_profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string|in:App,Website,Theme,UI UX',
            'price' => 'required_if:status,paid|nullable|numeric|min:0.01',
            'rating' => 'nullable|numeric|min:0|max:5',
            'status' => 'required|string|in:free,paid',
            'language' => 'nullable|string|in:PHP,Python,JavaScript,Laravel',
        ]);

        $imagePaths = $project->imagePaths();
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('project_images', 'public');
            }
        }

        $projectFilePath = $project->project_file_path;
        if ($request->hasFile('project_file')) {
            $projectFilePath = $request->file('project_file')->store('project_files', 'public');
        }

        $creatorProfilePicPath = $project->creator_profile_pic;
        if ($request->hasFile('creator_profile_pic')) {
            $creatorProfilePicPath = $request->file('creator_profile_pic')->store('creator_profiles', 'public');
        }

        $project->update([
            'title' => $request->title,
            'one_line_description' => $request->one_line_description,
            'tech_used' => $request->tech_used,
            'description' => $request->description,
            'image_path' => $imagePaths ? json_encode($imagePaths) : null,
            'project_file_path' => $projectFilePath,
            'project_link' => $request->project_link,
            'creator_name' => $request->creator_name,
            'company_name' => $request->company_name,
            'creator_profile_pic' => $creatorProfilePicPath,
            'category' => $request->category,
            'price' => $request->status === 'paid' ? $request->price : 0.00,
            'rating' => $request->rating ?? 0.0,
            'status' => $request->status,
            'language' => $request->language,
        ]);

        if ($request->hasFile('videos')) {
            $startOrder = (int) $project->videos()->max('sort_order');
            foreach ($request->file('videos') as $index => $video) {
                $project->videos()->create([
                    'title' => 'Video ' . ($startOrder + $index + 1),
                    'path' => $video->store('project_videos', 'public'),
                    'sort_order' => $startOrder + $index + 1,
                ]);
            }
        }

        return redirect()->route('panel.pages.project-details', $project)->with('success', 'Project updated successfully!');
    }

    public function show(Project $project)
    {
        $project->load(['videos', 'reviews.user']);

        $similarProjects = Project::whereKeyNot($project->id)
            ->where('category', $project->category)
            ->with('videos')
            ->latest()
            ->take(3)
            ->get();

        if ($similarProjects->count() < 3) {
            $moreProjects = Project::whereKeyNot($project->id)
                ->whereNotIn('id', $similarProjects->pluck('id'))
                ->with('videos')
                ->latest()
                ->take(3 - $similarProjects->count())
                ->get();

            $similarProjects = $similarProjects->concat($moreProjects);
        }

        $hasProjectAccess = $this->hasProjectAccess($project);
        $isProjectOwner = $project->isOwnedBy(Auth::user());
        $reviews = $project->reviews;
        $averageRating = $project->ratingValue();
        $reviewCount = $project->reviewCount();

        return view('panel.pages.project-details', compact('project', 'similarProjects', 'hasProjectAccess', 'isProjectOwner', 'reviews', 'averageRating', 'reviewCount'));
    }

    public function bill(Project $project)
    {
        if ($project->isOwnedBy(Auth::user())) {
            return redirect()
                ->route('panel.pages.project-details', $project)
                ->with('error', 'You added this project, so you cannot buy it. You can edit it instead.');
        }

        if ($project->status === 'free' || $this->hasProjectAccess($project)) {
            return redirect()
                ->route('panel.pages.project-details', $project)
                ->with('success', 'This project is already available.');
        }

        return view('panel.pages.bill', compact('project'));
    }

    public function completePurchase(Request $request, Project $project)
    {
        if ($project->isOwnedBy(Auth::user())) {
            return redirect()
                ->route('panel.pages.project-details', $project)
                ->with('error', 'You cannot buy your own project.');
        }

        if ($project->status === 'free') {
            return redirect()->route('panel.pages.project-details', $project);
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:2',
        ]);

        ProjectPurchase::updateOrCreate(
            [
                'project_id' => $project->id,
                'user_id' => Auth::id(),
            ],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country' => $request->country,
                'payment_method' => $request->payment_method ?? 'manual',
                'purchased_at' => now(),
            ]
        );

        return redirect()
            ->route('panel.pages.project-details', $project)
            ->with('success', 'Purchase completed. Downloads and all videos are unlocked.');
    }

    public function videos(Request $request, Project $project)
    {
        $project->load('videos');

        if ($project->videos->isEmpty()) {
            return redirect()
                ->route('panel.pages.project-details', $project)
                ->with('error', 'No videos are available for this project yet.');
        }

        $hasProjectAccess = $this->hasProjectAccess($project);
        $activeLesson = max(1, min((int) $request->query('lesson', 1), $project->videos->count()));

        if (! $hasProjectAccess && $activeLesson > 1) {
            return redirect()
                ->route('panel.pages.videos', ['project' => $project, 'lesson' => 1])
                ->with('error', 'Only the first video is free. Complete billing to unlock all videos.');
        }

        return view('panel.pages.videos', compact('project', 'activeLesson', 'hasProjectAccess'));
    }

    public function download(Request $request, Project $project)
    {
        if (! $this->hasProjectAccess($project)) {
            return redirect()
                ->route('panel.pages.bill', $project)
                ->with('error', 'Please complete billing before downloading this paid project.');
        }

        if (! $project->project_file_path || ! Storage::disk('public')->exists($project->project_file_path)) {
            return back()->with('error', 'No downloadable project file is available yet.');
        }

        return Storage::disk('public')->download($project->project_file_path);
    }

    public function storeReview(Request $request, Project $project)
    {
        if ($project->isOwnedBy(Auth::user())) {
            return back()->with('error', 'You cannot review your own project.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:2000',
        ]);

        $project->reviews()->create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        $project->update([
            'rating' => $project->reviews()->avg('rating') ?: 0,
        ]);

        return back()->with('success', 'Review posted successfully.');
    }

    private function hasProjectAccess(Project $project): bool
    {
        if ($project->status === 'free') {
            return true;
        }

        if ($project->isOwnedBy(Auth::user())) {
            return true;
        }

        return ProjectPurchase::where('project_id', $project->id)
            ->where('user_id', Auth::id())
            ->exists();
    }
}
