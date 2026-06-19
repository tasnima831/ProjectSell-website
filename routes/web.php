<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Models\ContactMessage;
use App\Models\ProjectReview;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Middleware\IsAdmin;
use App\Models\Project;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', function () {
    $homeProjects = Schema::hasTable('projects') ? Project::latest()->take(12)->get() : collect();
    $featuredProjects = Schema::hasTable('projects') ? Project::orderByDesc('rating')->latest()->take(3)->get() : collect();
    $testimonialReviews = Schema::hasTable('project_reviews')
        ? ProjectReview::with(['project', 'user'])->latest()->take(8)->get()
        : collect();
    $stats = [
        'clients' => Schema::hasTable('project_purchases') ? \App\Models\ProjectPurchase::distinct('email')->count('email') : 0,
        'projects' => Schema::hasTable('projects') ? Project::count() : 0,
        'support_hours' => Schema::hasTable('contact_messages') ? max(ContactMessage::count() * 2, 0) : 0,
        'workers' => Schema::hasTable('users') ? \App\Models\User::count() : 0,
    ];

    return view('panel.pages.home', compact('homeProjects', 'featuredProjects', 'testimonialReviews', 'stats'));
})->name('panel.pages.home');

Route::get('/stats', function () {
    return redirect()->to(route('panel.pages.home') . '#stats');
})->name('panel.pages.stats');

Route::get('/featured_projects', function () {
    return redirect()->to(route('panel.pages.home') . '#featured_projects');
})->name('panel.pages.featured_projects');

Route::get('/projects', [ProjectController::class, 'index'])->name('panel.pages.projects.index');

Route::get('/project-details', function () {
    $project = Schema::hasTable('projects') ? Project::latest()->first() : null;

    return $project
        ? redirect()->route('panel.pages.project-details', $project)
        : redirect()->route('panel.pages.projects.index');
});

Route::get('/bill', function () {
    $project = Schema::hasTable('projects') ? Project::where('status', 'paid')->latest()->first() : null;

    return $project
        ? redirect()->route('panel.pages.bill', $project)
        : redirect()->route('panel.pages.projects.index');
});

Route::get('/videos', function () {
    $project = Schema::hasTable('projects') ? Project::latest()->first() : null;

    return $project
        ? redirect()->route('panel.pages.videos', $project)
        : redirect()->route('panel.pages.projects.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('panel.pages.add-project-form');
    Route::post('/projects', [ProjectController::class, 'store'])->name('panel.pages.projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('panel.pages.projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('panel.pages.projects.update');
    Route::post('/projects/{project}/reviews', [ProjectController::class, 'storeReview'])->name('panel.pages.projects.reviews.store');
    Route::get('/projects/{project}/bill', [ProjectController::class, 'bill'])->name('panel.pages.bill');
    Route::post('/projects/{project}/bill', [ProjectController::class, 'completePurchase'])->name('panel.pages.bill.store');
    Route::get('/projects/{project}/download', [ProjectController::class, 'download'])->name('panel.pages.projects.download');
});

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('panel.pages.project-details');
Route::get('/projects/{project}/videos', [ProjectController::class, 'videos'])->name('panel.pages.videos');

Route::post('/contact', function () {
    $data = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    ContactMessage::create($data);

    return back()->with('contact_success', 'Your message has been sent. Thank you!');
})->name('panel.contact.store');

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/featured_projects/create', [ProjectController::class, 'create'])->name('panel.pages.featured-projects.create');
    Route::post('/featured_projects', [ProjectController::class, 'store'])->name('panel.pages.featured_projects.store');
});
