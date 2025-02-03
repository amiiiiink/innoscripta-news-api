<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepositoryInterface;
use App\Services\AggregationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AggregationService::class, function ($app) {
            return new AggregationService(
                $app->make('newsServices'),
                $app->make(ArticleRepositoryInterface::class),
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
