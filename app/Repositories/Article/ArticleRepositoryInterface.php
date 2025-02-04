<?php

namespace App\Repositories\Article;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface
{
    public function paginateByFilter(?string $category,?string $source, ?string $fromDate, ?string $toDate): LengthAwarePaginator;
}
