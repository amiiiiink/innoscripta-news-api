<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\Client\ConnectionException;

class AggregationService
{

    public function __construct(
        public NewsApiService     $newsApiService,
        public TheGuardianService $theGuardianService)
    {

    }

    /**
     * @return void
     * @throws ConnectionException
     */
    public function aggregate(): void
    {
        $keyword = "soldier";
        $newsApiArticles = $this->newsApiService->aggregate($keyword);
        $guardianArticles = $this->theGuardianService->aggregate($keyword);
        $articles = array_merge($newsApiArticles, $guardianArticles);
        if (!empty($articles)) {
            $articlesArray = array_map(fn($article) => $article->toArray(), $articles);
            Article::query()->insert($articlesArray);
        }


    }
}
