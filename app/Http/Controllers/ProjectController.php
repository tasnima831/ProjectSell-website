<?php

namespace App\Http\Controllers;

use App\Models\Project;
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

        $projects = $projectsQuery->paginate(9)->withQueryString();

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
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'category' => 'required|string|in:App,Website,Theme,UI UX',
            'price' => 'nullable|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'status' => 'required|string|in:free,paid',
            'language' => 'nullable|string|in:PHP,Python,JavaScript,Laravel',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('project_images', 'public');
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'category' => $request->category,
            'price' => $request->price ?? 0.00,
            'rating' => $request->rating ?? 0.0,
            'status' => $request->status,
            'language' => $request->language,
        ]);

        return redirect()->route('panel.pages.featured_projects')->with('success', 'Project added successfully!');
    }
}
