<?php

namespace App\Services\Aggregation\ThirdParties;

use App\DTO\ArticleDTO;
use App\Exceptions\NewsServiceException;
use App\Services\Aggregation\Abstract\BaseNewsService;

class NewYorkTimesService extends BaseNewsService
{
    protected string $baseUrl = 'https://api.nytimes.com/';

    /**
     * @throws NewsServiceException
     */
    public function aggregate(string $keyword): ?array
    {
        return $this->fetchArticles('svc/search/v2/articlesearch.json', ['q' => $keyword,'api-key' => $this->apiKey]);
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
