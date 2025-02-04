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
}
