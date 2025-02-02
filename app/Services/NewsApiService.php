<?php

namespace App\Services;

use App\DTO\ArticleDTO;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NewsApiService
{
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.news_api.api_key');
    }

    public function aggregate(string $keyword): ?array
    {
        try {
            $response = Http::withHeaders([
                'X-Api-Key' => $this->apiKey
            ])->get('https://newsapi.org/v2/everything', [
                'q' => $keyword
            ]);

            $articles = $response->json();

            return $this->mapArticles($articles);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return null;
        }
    }

    private function mapArticles(array $articles): array
    {
        if ($articles['status'] !== 'ok') {
            return [];
        }

        return array_map(fn($article) => ArticleDTO::fromNewsApi($article), $articles['articles']);
    }
}
