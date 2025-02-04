<?php

namespace App\Services\Api;


use App\DTO\UserSearchDTO;
use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\UserSearch\UserSearchRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ArticleService
{
    public function __construct(
        public ArticleRepositoryInterface $articleRepository,
        public UserSearchRepository       $userSearchRepository,
    )
    {
    }

    public function filter(?string $category, ?string $source, ?string $fromDate, ?string $toDate): LengthAwarePaginator
    {

        $searchDTO = UserSearchDTO::fromRequest(new Request([
            'user_id' => auth()->user()->id,
            'category' => $category,
            'source' => $source,
        ]));

        if ($searchDTO->user_id)
            $this->userSearchRepository->create($searchDTO->toArray());

        return $this->articleRepository->paginateByFilter($category, $source, $fromDate, $toDate);
    }
}
