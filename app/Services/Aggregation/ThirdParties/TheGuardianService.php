<?php

namespace App\Services\Aggregation\ThirdParties;

use App\DTO\ArticleDTO;
use App\Services\Aggregation\Abstract\BaseNewsService;

class TheGuardianService extends BaseNewsService
{
    protected string $baseUrl = 'https://content.guardianapis.com';

    protected function setHeaders(): void
    {
        $this->headers = ['api-key' => $this->apiKey];
    }

    public function aggregate(string $keyword): ?array
    {
        return $this->fetchArticles('/search', ['q' => $keyword]);
    }

    protected function validateResponse(array $data): bool
    {
        return isset($data['response']['status']) && $data['response']['status'] === 'ok';
    }

    protected function mapArticles(array $articles): array
    {
        return array_map(fn($article) => ArticleDTO::fromGuardianApi($article), $articles['response']['results'] ?? []);
    }
}
