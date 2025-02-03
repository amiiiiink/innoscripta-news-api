<?php

namespace App\Services\ThirdParties;

use App\DTO\ArticleDTO;
use App\Services\Abstract\BaseNewsService;

class NewYorkTimesService extends BaseNewsService
{
    protected string $baseUrl = 'https://api.nytimes.com/';

    public function aggregate(string $keyword): ?array
    {
        return $this->fetchArticles('/svc/search/v2/articlesearch.json', ['q' => $keyword]);
    }

    protected function setHeaders(): void
    {
        $this->headers = ['api-key' => $this->apiKey];
    }

    protected function validateResponse(array $data): bool
    {
        return isset($data['status']) && $data['status'] === 'ok';
    }

    protected function mapArticles(array $articles): array
    {
        return array_map(fn($article) => ArticleDTO::fromNewYorkTimesApi($article), $articles['response']['docs'] ?? []);
    }
}
