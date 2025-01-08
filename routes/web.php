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
use App\Models\Article;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
  // Define cache keys for different sections
  $articleId = $request->get('id');
  if ($articleId) {
    $view = 'landing.read_news';
    $article = Article::find($articleId);
    return view($view, [
      'news' => $article,
    ]);
  }
  $view = 'landing.news';
  $subjectsWithArticles = Subject::with('articles')->get()->map(function ($subject) {
    $subject->articles = $subject->articles->filter(fn($article) => $article->status === 'approved');
    return $subject;
  });
  $breaking = Article::where('status', 'approved')->orderByDesc('created_at')->limit(5)->get();
  return view($view, [
    'subjects' => $subjectsWithArticles,
    'breaking' => $breaking
  ]);
  $breakingCacheKey = 'breaking_news_v1';
  $carouselCacheKey = 'carousel_news_v1';
  $popularCacheKey = 'popular_news_v1';
  $nationalCacheKey = 'national_news_v1';
  $internationalCacheKey = 'international_news_v1';

  // Cache duration (in minutes)
  $cacheDuration = 120; // Cache for 15 minutes

  // Breaking News
  $breaking = Cache::remember($breakingCacheKey, now()->addMinutes($cacheDuration), function () {
    return array_map(function ($item) {
      return (object) [
        'title' => $item['title'],
        'thumbnail' => $item['image'],
        'url' => $item['link'],
      ];
    }, array_slice(Http::get('https://berita-indo-api-next.vercel.app/api/antara-news/terkini')->json()['data'], 0, 5));
  });

  // Carousel News
  $carousel = Cache::remember($carouselCacheKey, now()->addMinutes($cacheDuration), function () {
    return array_map(function ($item) {
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
  });

  // Popular News (using carousel data)
  $popular = $carousel;

  // National News
  $national = Cache::remember($nationalCacheKey, now()->addMinutes($cacheDuration), function () {
    return array_map(function ($item) {
      return (object) [
        'title' => $item['title'],
        'thumbnail' => $item['image']['small'],
        'url' => $item['link'],
        'author' => $item['author'] ?? 'admin',
        'date' => \Carbon\Carbon::parse($item['isoDate'])->format('d F Y'),
        'categories' => [
          (object) [
            'url' => 'https://www.cnnindonesia.com/category/nasional/',
            'name' => 'Nasional',
          ],
        ],
      ];
    }, array_slice(Http::get('https://berita-indo-api-next.vercel.app/api/cnn-news/nasional')->json()['data'], 0, 10));
  });

  // International News
  $international = Cache::remember($internationalCacheKey, now()->addMinutes($cacheDuration), function () {
    return array_map(function ($item) {
      return (object) [
        'title' => $item['title'],
        'thumbnail' => $item['image']['small'],
        'url' => $item['link'],
        'date' => \Carbon\Carbon::parse($item['isoDate'])->format('d F Y'),
      ];
    }, array_slice(Http::get('https://berita-indo-api-next.vercel.app/api/cnn-news/internasional')->json()['data'], 0, 9));
  });

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
