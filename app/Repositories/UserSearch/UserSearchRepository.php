<?php

namespace App\Repositories\UserSearch;


use App\Models\UserSearch;
use App\Repositories\BaseRepository;

class UserSearchRepository extends BaseRepository implements UserSearchRepositoryInterface
{
    public function __construct(UserSearch $model)
    {
        parent::__construct($model);
    }


    public function getUserSearches(): mixed
    {
        return $this->model->query()
            ->where('user_id', auth()->user()->id)
            ->whereNotNull('category')
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->orderByDesc('count')
            ->pluck('category')
            ->toArray();
    }
}
