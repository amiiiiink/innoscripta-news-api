<?php

namespace App\Services\Aggregation\Contracts;

interface NewsServiceInterface
{
    public function aggregate(string $keyword): ?array;
}
