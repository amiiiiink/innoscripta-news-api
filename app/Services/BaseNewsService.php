<?php

namespace App\Services;

use App\Exceptions\NewsServiceException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class BaseNewsService
{
    protected string $apiKey;
    protected string $baseUrl;
    protected array $headers = [];

    public function __construct(string $configKey)
    {

        $this->apiKey = config($configKey);
        $this->setHeaders();
    }

    abstract protected function setHeaders(): void;

    protected function fetchArticles(string $endpoint, array $params): ?array
    {
        try {
            $response = Http::withHeaders($this->headers)->get("{$this->baseUrl}{$endpoint}", $params);
            $data = $response->json();
            return $this->validateResponse($data) ? $this->mapArticles($data) : [];
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            throw new NewsServiceException();
//            return [];
        }
    }

    protected function validateResponse(array $data): bool
    {
        return true;
    }

    abstract protected function mapArticles(array $articles): array;
}
