<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepository;
use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
    }
}
