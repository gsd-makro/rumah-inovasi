<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\InfographicController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PolicyBriefController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  // $breaking = [
  //   (object) [
  //     'title' => 'UI Moratorium Penerimaan Mahasiswa Baru S3 SKSG Imbas Kasus Bahlil',
  //     'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/08/20/bahlil-lahadalia-hadiri-pembukaan-munas-xi-partai-golkar-1_169.jpeg?w=360&q=90',
  //     'url' => 'https://www.cnnindonesia.com/nasional/20241114062618-20-1166380/ui-moratorium-penerimaan-mahasiswa-baru-s3-sksg-imbas-kasus-bahlil'
  //   ],
  // ];

  // $carousel = [
  //   (object) [
  //     'title' => 'Pria di Cengkareng Berkebun Ganja di Loteng Rumah, Ada 40 Batang Pohon',
  //     'thumbnail' => 'https://akcdn.detik.net.id/visual/2022/06/08/kebun-ganja-milik-pemerintah-thailand-1_169.jpeg?w=360&q=90',
  //     'url' => 'https://www.cnnindonesia.com/nasional/20241114033418-12-1166367/pria-di-cengkareng-berkebun-ganja-di-loteng-rumah-ada-40-batang-pohon',
  //     'author' => 'admin',
  //     'date' => '13 November 2024',
  //     'categories' => [
  //       (object) [
  //         'url' => 'https://www.cnnindonesia.com/nasional/',
  //         'name' => 'Nasional',
  //       ],
  //     ]
  //   ],
  // ];

  // $popular = [
  //   (object) [
  //     'title' => 'Tukang Sate Bunuh Remaja di Maros karena Kesal Ditagih Utang',
  //     'thumbnail' => 'https://akcdn.detik.net.id/visual/2018/08/29/5f396afc-c6fc-470e-85f4-6629311adb5d_169.jpeg?w=360&q=90',
  //     'url' => 'https://www.cnnindonesia.com/nasional/20241113135054-12-1166151/tukang-sate-bunuh-remaja-di-maros-karena-kesal-ditagih-utang',
  //     'date' => '13 November 2024',
  //   ],
  // ];
  $breaking = array_map(function ($item) {
    return (object) [
      'title' => $item['title'],
      'thumbnail' => $item['image'],
      'url' => $item['link'],
    ];
  }, array_slice(Http::get('https://berita-indo-api-next.vercel.app/api/antara-news/terkini')->json()['data'], 0, 5));

  $carousel = array_map(function ($item) {
    return (object) [
      'title' => $item['title'],
      'thumbnail' => $item['image'],
      'url' => $item['link'],
      'author' => 'admin',
      'date' => \Carbon\Carbon::parse($item['isoDate'])->format('d F Y'),
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/nasional/',
          'name' => 'Top News',
        ],
      ],
    ];
  }, array_slice(Http::get('https://berita-indo-api-next.vercel.app/api/antara-news/top-news')->json()['data'], 0, 5));

  $popular = $carousel;

  $national = array_map(function ($item) {
    return (object) [
      'title' => $item['title'],
      'thumbnail' => $item['image']['small'],
      'url' => $item['link'],
      'author' => isset($item['author']) ? $item['author'] : 'admin',
      'date' => \Carbon\Carbon::parse($item['isoDate'])->format('d F Y'),
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/category/nasional/',
          'name' => 'Nasional',
        ],
      ],
    ];
  }, array_slice(Http::get('https://berita-indo-api-next.vercel.app/api/cnn-news/nasional')->json()['data'], 0, 10));

  $international = array_map(
    function ($item) {
      return (object) [
        'title' => $item['title'],
        'thumbnail' => $item['image']['small'],
        'url' => $item['link'],
        'date' => \Carbon\Carbon::parse($item['isoDate'])->format('d F Y'),
      ];
    },
    array_slice(Http::get('https://berita-indo-api-next.vercel.app/api/cnn-news/internasional')->json()['data'], 0, 9)
  );

  return view('landing.home', compact('breaking', 'carousel', 'popular', 'national', 'international'));
})->name('landing.home');

Route::prefix('/auth')->controller(AuthController::class)->group(function () {
  Route::get('/login', 'index')->name('login');
  Route::post('/login', 'authenticate')->name('authenticate');
  Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');

  Route::resource('menus', MenuController::class)->names([
    'index' => 'menus.index',
    'create' => 'menus.create',
    'store' => 'menus.store',
    'show' => 'menus.show',
    'edit' => 'menus.edit',
    'update' => 'menus.update',
    'destroy' => 'menus.destroy',
  ])->middleware(SuperAdminMiddleware::class);

  Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'show' => 'users.show',
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy',
  ])->middleware(SuperAdminMiddleware::class);

  Route::resource('subjects', SubjectController::class)->names([
    'index' => 'subjects.index',
    'create' => 'subjects.create',
    'store' => 'subjects.store',
    'show' => 'subjects.show',
    'edit' => 'subjects.edit',
    'update' => 'subjects.update',
    'destroy' => 'subjects.destroy',
  ])->middleware(SuperAdminMiddleware::class);

  Route::resource('indicators', IndicatorController::class)->names([
    'index' => 'indicators.index',
    'create' => 'indicators.create',
    'store' => 'indicators.store',
    'show' => 'indicators.show',
    'edit' => 'indicators.edit',
    'update' => 'indicators.update',
    'destroy' => 'indicators.destroy',
  ])->middleware(SuperAdminMiddleware::class);


  Route::resource('articles', ArticleController::class)->names([
    'index' => 'articles.index',
    'create' => 'articles.create',
    'store' => 'articles.store',
    'show' => 'articles.show',
    'edit' => 'articles.edit',
    'update' => 'articles.update',
    'destroy' => 'articles.destroy',
  ]);

  Route::put('/articles/{id}/verify', [ArticleController::class, 'verify'])->name('articles.verify')->middleware(SuperAdminMiddleware::class);


  Route::resource('infographics', InfographicController::class)->names([
    'index' => 'infographics.index',
    'create' => 'infographics.create',
    'store' => 'infographics.store',
    'show' => 'infographics.show',
    'edit' => 'infographics.edit',
    'update' => 'infographics.update',
    'destroy' => 'infographics.destroy',
  ]);

  Route::put('/infographics/{id}/verify', [InfographicController::class, 'verify'])->name('infographics.verify')->middleware(SuperAdminMiddleware::class);

  Route::resource('policy-briefs', PolicyBriefController::class)->names([
    'index' => 'policy_briefs.index',
    'create' => 'policy_briefs.create',
    'store' => 'policy_briefs.store',
    'show' => 'policy_briefs.show',
    'edit' => 'policy_briefs.edit',
    'update' => 'policy_briefs.update',
    'destroy' => 'policy_briefs.destroy',
  ]);

  Route::put('/policy-briefs/{id}/verify', [PolicyBriefController::class, 'verify'])->name('policy_briefs.verify')->middleware(SuperAdminMiddleware::class);

  Route::resource('documents', DocumentController::class)->names([
    'index' => 'documents.index',
    'create' => 'documents.create',
    'store' => 'documents.store',
    'show' => 'documents.show',
    'edit' => 'documents.edit',
    'update' => 'documents.update',
    'destroy' => 'documents.destroy',
  ]);

  Route::put('/documents/{id}/verify', [DocumentController::class, 'verify'])->name('documents.verify')->middleware(SuperAdminMiddleware::class);

  Route::resource('videos', VideoController::class)->names([
    'index' => 'videos.index',
    'create' => 'videos.create',
    'store' => 'videos.store',
    'show' => 'videos.show',
    'edit' => 'videos.edit',
    'update' => 'videos.update',
    'destroy' => 'videos.destroy',
  ]);

  Route::resource('photos', PhotoController::class)->names([
    'index' => 'photos.index',
    'create' => 'photos.create',
    'store' => 'photos.store',
    'show' => 'photos.show',
    'edit' => 'photos.edit',
    'update' => 'photos.update',
    'destroy' => 'photos.destroy',
  ]);

  Route::put('/photos/{id}/verify', [PhotoController::class, 'verify'])->name('photos.verify')->middleware(SuperAdminMiddleware::class);


  Route::put('/videos/{id}/verify', [VideoController::class, 'verify'])->name('videos.verify')->middleware(SuperAdminMiddleware::class);

  Route::prefix('/feedbacks')->controller(FeedbackController::class)->group(function () {
    Route::get('/', 'index')->name('feedbacks.index');
    Route::put('/{id}/approved', 'approve')->name('feedbacks.approve');
    Route::put('/{id}/reply', 'reply')->name('feedbacks.reply');
    Route::delete('/{id}/destroy', 'destroy')->name('feedbacks.destroy');
    Route::put('/read', 'read')->name('feedbacks.markRead');
  });
});

Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');

Route::get('/{any}', [MenuController::class, 'dinamicView'])
  ->where('any', '.*')
  ->name('dinamic.view');
