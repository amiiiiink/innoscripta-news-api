<?php

namespace App\Services\Aggregation\ThirdParties;

use App\DTO\ArticleDTO;
use App\Services\Aggregation\Abstract\BaseNewsService;

class NewsApiService extends BaseNewsService
{
    protected string $baseUrl = 'https://newsapi.org/v2';

    protected function setHeaders(): void
    {
        $this->headers = ['X-Api-Key' => $this->apiKey];
    }

    public function aggregate(string $keyword): ?array
    {
        return $this->fetchArticles('/everything', ['q' => $keyword]);
    }

    protected function validateResponse(array $data): bool
    {
        return isset($data['status']) && $data['status'] === 'ok';
    }

    protected function mapArticles(array $articles): array
    {
        return array_map(fn($article) => ArticleDTO::fromNewsApi($article), $articles['articles'] ?? []);
    }
}
