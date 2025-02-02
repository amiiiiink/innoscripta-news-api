<?php

namespace App\Services\Contracts;

interface NewsServiceInterface
{
    public function aggregate(string $keyword): ?array;
}
