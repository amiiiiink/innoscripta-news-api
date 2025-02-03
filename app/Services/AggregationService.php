<?php

namespace App\Services;

use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Http\Client\ConnectionException;

class AggregationService
{

    public function __construct(
        public array                      $newsServices,
        public ArticleRepositoryInterface $articleRepository,
    )
    {

    }

    /**
     * @param string $keyword
     * @return void
     */
    public function aggregate(string $keyword): void
    {

        $articles = [];

        foreach ($this->newsServices as $service) {
            $articles = array_merge($articles, $service->aggregate($keyword));
        }

        if (!empty($articles)) {
            $articlesArray = array_map(fn($article) => $article->toArray(), $articles);
            $this->articleRepository->create($articlesArray);
        }
    }
}
