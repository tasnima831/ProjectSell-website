<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', function () {
    return view('panel.pages.home');
})->name('panel.pages.home');

Route::get('/stats', function () {
    return redirect()->to(route('panel.pages.home') . '#stats');
})->name('panel.pages.stats');

Route::get('/projects', function () {
    return redirect()->to(route('panel.pages.home') . '#projects');
})->name('panel.pages.projects');

Route::get('/project-details', function () {
    return view('panel.pages.project-details');
})->name('panel.pages.project-details');

Route::get('/portfolio-details', function () {
    return view('panel.pages.portfolio-details');
})->name('panel.pages.portfolio-details');

Route::middleware(['auth'])->group(function () {
    Route::get('/houses/create', [HouseController::class, 'create'])->name('panel.pages.add-house-form');
    Route::post('/houses', [HouseController::class, 'store'])->name('panel.pages.houses.store');
});

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
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('panel.pages.add-project-form');
    Route::post('/projects', [ProjectController::class, 'store'])->name('panel.pages.projects.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/videos', function () {
        return view('panel.pages.videos');
    })->name('panel.pages.videos');
});