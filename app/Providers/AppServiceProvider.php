<?php

namespace App\Providers;

use App\Models\Feedback;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.dashboard.sidebar', function ($view) {
            $totalFeedbacks = Feedback::where('is_read', 0)->count();
            $view->with('totalFeedbacks', $totalFeedbacks);
        });
    }
}
