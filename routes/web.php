<?php

use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('panel.pages.register');
})->name('register');

Route::post('/register', function () {
    return redirect()->route('panel.pages.home');
});

Route::get('/about', function () {
    return redirect()->to(route('panel.pages.home') . '#about');
})->name('panel.pages.about');

Route::get('/', function () {
    return view('panel.pages.home');
})->name('panel.pages.home');

Route::get('/stats', function () {
    return redirect()->to(route('panel.pages.home') . '#stats');
})->name('panel.pages.stats');

Route::get('/service', function () {
    return redirect()->to(route('panel.pages.home') . '#service');
})->name('panel.pages.service');

Route::get('/service-details', function () {
    return view('panel.pages.service-details');
})->name('panel.pages.service-details');

Route::get('/portfolio-details', function () {
    return view('panel.pages.portfolio-details');
})->name('panel.pages.portfolio-details');