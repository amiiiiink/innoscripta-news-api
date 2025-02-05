<?php

namespace App\Services\Api;

use App\Models\UserSearch;
use App\Repositories\UserSearch\UserSearchRepository;
use Illuminate\Database\Eloquent\Builder;

class UserSearchService
{

    public function __construct(public UserSearchRepository $userSearchRepository)
    {
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function applyUserPreferences(Builder $query): Builder
    {
        $preferredCategories = $this->userSearchRepository->getUserSearches();

        if (!empty($preferredCategories))
            $query->orWhereIn('category', $preferredCategories);


        return $query;
    }
}
