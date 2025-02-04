<?php

namespace App\Services\Api;


use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function __construct(
        public ArticleRepositoryInterface $articleRepository,
    )
    {
    }

    public function filter(?string $category, ?string $source, ?string $fromDate, ?string $toDate): LengthAwarePaginator
    {
        return $this->articleRepository->paginateByFilter($category, $source, $fromDate, $toDate);
    }
}
