<?php

namespace App\Services\Aggregation;

use App\Repositories\Article\ArticleRepositoryInterface;

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
            foreach ($articlesArray as $article) {
                $this->articleRepository->create($article);
            }
        }
    }
}
