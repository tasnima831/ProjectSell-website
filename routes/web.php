<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
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

    return view('panel.pages.home', compact('homeProjects', 'featuredProjects'));
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

Route::middleware(['auth'])->group(function () {
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('panel.pages.add-project-form');
    Route::post('/projects', [ProjectController::class, 'store'])->name('panel.pages.projects.store');
});

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('panel.pages.project-details');

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/bill', function () {
        return view('panel.pages.bill');
    })->name('panel.pages.bill');
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/featured_projects/create', [ProjectController::class, 'create'])->name('panel.pages.featured-projects.create');
    Route::post('/featured_projects', [ProjectController::class, 'store'])->name('panel.pages.featured_projects.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/videos', function () {
        return view('panel.pages.videos');
    })->name('panel.pages.videos');
});
