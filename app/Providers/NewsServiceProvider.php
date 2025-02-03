<?php

namespace App\Providers;

use App\Services\ThirdParties\NewsApiService;
use App\Services\ThirdParties\NewYorkTimesService;
use App\Services\ThirdParties\TheGuardianService;
use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->singleton(TheGuardianService::class, function () {
            return new TheGuardianService('services.guardian.api_key');
        });

        $this->app->singleton(NewsApiService::class, function () {
            return new NewsApiService('services.news_api.api_key');
        });
        $this->app->singleton(NewYorkTimesService::class, function () {
            return new NewYorkTimesService('services.new_york_api.api_key');
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
