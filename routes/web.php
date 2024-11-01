<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('landing.home'));

Route::get('/dashboard', fn() => view('dashboard.home'))->name('dashboard');
Route::get('/blank', fn() => view('dashboard.blank'))->name('dashboard');
Route::get('/infographic', fn() => view('dashboard.infographic'))->name('dashboard');
