<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/about', function () {
    return redirect()->to(route('panel.pages.home') . '#about');
})->name('panel.pages.about');

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