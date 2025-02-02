<?php

namespace App\Providers;

use App\Services\NewsApiService;
use App\Services\TheGuardianService;
use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->singleton(TheGuardianService::class, function ($app) {
            return new TheGuardianService('services.guardian.api_key');
        });

        $this->app->singleton(NewsApiService::class, function ($app) {
            return new NewsApiService('services.news_api.api_key');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
