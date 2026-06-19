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
            'one_line_description' => 'nullable|string|max:255',
            'tech_used' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        $projectFilePath = null;
        if ($request->hasFile('project_file')) {
            $projectFilePath = $request->file('project_file')->store('project_files', 'public');
        }

        $creatorProfilePicPath = null;
        if ($request->hasFile('creator_profile_pic')) {
            $creatorProfilePicPath = $request->file('creator_profile_pic')->store('creator_profiles', 'public');
        }

        $project = Project::create([
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

        return redirect()->route('panel.pages.project-details', $project)->with('success', 'Project added successfully!');
    }

    public function show(Project $project)
    {
        $similarProjects = Project::whereKeyNot($project->id)
            ->where('category', $project->category)
            ->latest()
            ->take(3)
            ->get();

        if ($similarProjects->count() < 3) {
            $moreProjects = Project::whereKeyNot($project->id)
                ->whereNotIn('id', $similarProjects->pluck('id'))
                ->latest()
                ->take(3 - $similarProjects->count())
                ->get();

            $similarProjects = $similarProjects->concat($moreProjects);
        }

        return view('panel.pages.project-details', compact('project', 'similarProjects'));
    }
}
