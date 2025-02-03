<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model)
    {
    }
    public function create(array $payload)
    {
        return $this->model->query()->create($payload);
    }
}
