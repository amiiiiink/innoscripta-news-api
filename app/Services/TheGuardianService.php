<?php
namespace App\Services;

use App\DTO\ArticleDTO;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TheGuardianService
{
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.guardian.api_key');
    }

    public function aggregate(string $keyword): ?array
    {
        try {
            $response = Http::withHeaders([
                'api-key' => $this->apiKey
            ])->get('https://content.guardianapis.com/search', [
                'q' => $keyword
            ]);

            $articles = $response->json();

            return $this->mapArticles($articles);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return null;
        }
    }

    private function mapArticles(array $articles): array
    {
        if (!isset($articles['response']['status']) || $articles['response']['status'] !== 'ok') {
            return [];
        }

        return array_map(fn($article) => ArticleDTO::fromGuardianApi($article), $articles['response']['results']);
    }
}
