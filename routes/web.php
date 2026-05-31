<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('panel.pages.register');
})->name('register');

Route::post('/register', function () {
    return redirect()->route('panel.pages.home');
});

Route::get('/about', function () {
    return redirect()->to(route('panel.pages.home') . '#about');
})->name('panel.pages.about');

Route::get('/home', function () {
    return view('panel.pages.home');
})->name('panel.pages.home');