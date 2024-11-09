<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\InfographicController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('landing.home', [
  'breaking' => collect([
    (object) ['title' => 'what we’ll wear in the coming year', 'url' => 'https://demo.bootstrap.news/default/2019/06/what-well-wear-in-the-coming-year/'],
    (object) ['title' => 'Celebrating the legendary fashion designer', 'url' => 'https://demo.bootstrap.news/default/2019/06/celebrating-the-legendary-fashion-designer/'],
    (object) ['title' => 'the classic of formal menswear is changing', 'url' => 'https://demo.bootstrap.news/default/2019/06/the-classic-of-formal-menswear-is-changing/'],
    (object) ['title' => 'How the 1960s changed what we wear', 'url' => 'https://demo.bootstrap.news/default/2019/06/how-the-1960s-changed-what-we-wear/'],
  ]),
  'sliderNews' => (object) [
    'title' => 'The world’s first floating farm making waves in Rotterdam',
    'url' => 'https://demo.bootstrap.news/default/2019/06/the-worlds-first-floating-farm-making-waves-in-rotterdam/',
    'author' => (object)['name' => 'Ari Budin', 'username' => 'aribudin'],
    'date' => '13-06-2019',
    'thumbnails' => collect([
      (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/pexels-photo-434490-568x484.jpg', 'width' => 568],
      (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/pexels-photo-434490-282x240.jpg', 'width' => 282],
      (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/pexels-photo-434490-400x340.jpg', 'width' => 400],
      (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/pexels-photo-434490-750x639.jpg', 'width' => 750],
    ])
  ],
  'boxNews' => collect([
    (object) [
      'title' => 'How Aerobic Classes Can Make You a Better Problem Solver',
      'url' => 'https://demo.bootstrap.news/default/2019/06/how-aerobic-classes-can-make-you-a-better-problem-solver/',
      'categories' => collect([
        (object) ['name' => 'Adventure', 'slug' => 'adventure'],
        (object) ['name' => 'Travel', 'slug' => 'travel'],
      ]),
      'thumbnails' => collect([
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/photo-1484510804300-8f7b8412424d-282x240.jpg', 'width' => 282],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/photo-1484510804300-8f7b8412424d-400x340.jpg', 'width' => 400],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/photo-1484510804300-8f7b8412424d-568x484.jpg', 'width' => 568],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/photo-1484510804300-8f7b8412424d-750x639.jpg', 'width' => 750],
      ])
    ],
    (object) [
      'title' => 'Here’s How Fast and Far a Sneeze Can Carry Contagious Germs',
      'url' => 'https://demo.bootstrap.news/default/2019/06/heres-how-fast-and-far-a-sneeze-can-carry-contagious-germs/',
      'categories' => collect([
        (object) ['name' => 'Adventure', 'slug' => 'adventure'],
        (object) ['name' => 'Travel', 'slug' => 'travel'],
      ]),
      'thumbnails' => collect([
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/oia-416135_960_720-282x240.jpg', 'width' => 282],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/oia-416135_960_720-400x340.jpg', 'width' => 400],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/oia-416135_960_720-568x484.jpg', 'width' => 568],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/oia-416135_960_720-750x639.jpg', 'width' => 750],
      ])
    ],
    (object) [
      'title' => 'Fans celebrate in Paris after side reaches World Cup final',
      'url' => 'https://demo.bootstrap.news/default/2019/06/fans-celebrate-in-paris-after-side-reaches-world-cup-final-2/',
      'categories' => collect([
        (object) ['name' => 'Travel', 'slug' => 'travel'],
      ]),
      'thumbnails' => collect([
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/pexels-photo-338515-282x240.jpg', 'width' => 282],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/pexels-photo-338515-400x340.jpg', 'width' => 400],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/pexels-photo-338515-568x484.jpg', 'width' => 568],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/pexels-photo-338515-750x639.jpg', 'width' => 750],
      ])
    ],
    (object) [
      'title' => '5 Tips to Save Money Booking Your Next Hotel Room',
      'url' => 'https://demo.bootstrap.news/default/2019/06/5-tips-to-save-money-booking-your-next-hotel-room/',
      'categories' => collect([
        (object) ['name' => 'Travel', 'slug' => 'travel'],
      ]),
      'thumbnails' => collect([
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/church-2020258_960_720-282x240.jpg', 'width' => 282],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/church-2020258_960_720-400x340.jpg', 'width' => 400],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/church-2020258_960_720-568x484.jpg', 'width' => 568],
        (object) ['url' => 'https://demo.bootstrap.news/default/wp-content/uploads/2019/06/church-2020258_960_720-750x639.jpg', 'width' => 750],
      ])
    ]
  ])
]));

Route::prefix('/auth')->controller(AuthController::class)->group(function () {
  Route::get('/login', 'index')->name('login');
  Route::post('/login', 'authenticate')->name('authenticate');
  Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('dashboard')->group(function () {
  Route::get('/', fn() => view('dashboard.home'))->name('dashboard.home');
  Route::get('/blank', fn() => view('dashboard.blank'))->name('dashboard');
  Route::get('/infographic', fn() => view('dashboard.infographic.infographic'))->name('dashboard');

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

  Route::resource('infographics', InfographicController::class)->names([
    'index' => 'infographics.index',
    'create' => 'infographics.create',
    'store' => 'infographics.store',
    'show' => 'infographics.show',
    'edit' => 'infographics.edit',
    'update' => 'infographics.update',
    'destroy' => 'infographics.destroy',
  ]);

  Route::resource('documents', DocumentController::class)->names([
    'index' => 'documents.index',
    'create' => 'documents.create',
    'store' => 'documents.store',
    'show' => 'documents.show',
    'edit' => 'documents.edit',
    'update' => 'documents.update',
    'destroy' => 'documents.destroy',
  ]);
});
