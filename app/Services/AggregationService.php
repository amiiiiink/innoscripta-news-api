<?php

namespace App\Services;

use App\Repositories\Article\ArticleRepositoryInterface;
use App\Services\ThirdParties\NewsApiService;
use App\Services\ThirdParties\NewYorkTimesService;
use App\Services\ThirdParties\TheGuardianService;
use Illuminate\Http\Client\ConnectionException;

class AggregationService
{

    public function __construct(
        public NewsApiService     $newsApiService,
        public TheGuardianService $theGuardianService,
        public NewYorkTimesService $newYorkTimesService,
        public ArticleRepositoryInterface $articleRepository,
    )
    {

    }

    /**
     * @return void
     * @throws ConnectionException
     */
    public function aggregate(): void
    {
        $keyword = "test";

        $newsApiArticles = $this->newsApiService->aggregate($keyword);
        $guardianArticles = $this->theGuardianService->aggregate($keyword);
        $newYorkTimes = $this->newYorkTimesService->aggregate($keyword);

        $articles = array_merge($newsApiArticles, $guardianArticles,$newYorkTimes);

        if (!empty($articles)) {
            $articlesArray = array_map(fn($article) => $article->toArray(), $articles);
            $this->articleRepository->create($articlesArray);
        }
    }
}
