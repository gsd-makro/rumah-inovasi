<?php

use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('landing.home'));

Route::prefix('dashboard')->group(function () {
  Route::get('/', fn() => view('dashboard.home'))->name('dashboard');
  Route::get('/blank', fn() => view('dashboard.blank'))->name('dashboard');
  Route::get('/infographic', fn() => view('dashboard.infographic'))->name('dashboard');

  Route::resource('menus', MenuController::class)->names([
    'index' => 'menus.index',
    'create' => 'menus.create',
    'store' => 'menus.store',
    'show' => 'menus.show',
    'edit' => 'menus.edit',
    'update' => 'menus.update',
    'destroy' => 'menus.destroy',
  ]);

  Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'show' => 'users.show',
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy',
  ]);

  Route::resource('subjects', SubjectController::class)->names([
    'index' => 'subjects.index',
    'create' => 'subjects.create',
    'store' => 'subjects.store',
    'show' => 'subjects.show',
    'edit' => 'subjects.edit',
    'update' => 'subjects.update',
    'destroy' => 'subjects.destroy',
  ]);

  Route::resource('indicators', IndicatorController::class)->names([
    'index' => 'indicators.index',
    'create' => 'indicators.create',
    'store' => 'indicators.store',
    'show' => 'indicators.show',
    'edit' => 'indicators.edit',
    'update' => 'indicators.update',
    'destroy' => 'indicators.destroy',
  ]);
});
