<?php

namespace App\Providers;

use App\Jobs\AggregateArticlesJob;
use App\Repositories\Article\ArticleRepositoryInterface;
use App\Services\Aggregation\AggregationService;
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
//        AggregateArticlesJob::dispatch(['technology', 'sports', 'health', 'business', 'entertainment', 'science', 'politics', 'finance'][array_rand(['technology', 'sports', 'health', 'business', 'entertainment', 'science', 'politics', 'finance'])]);
    }
}
