<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ArticleRequest;
use App\Services\Api\ArticleService;
use Illuminate\Http\JsonResponse;


class ArticleController extends Controller
{
    public function __construct(public ArticleService $articleService)
    {
    }

    /**
     * @param ArticleRequest $request
     * @return JsonResponse
     */
    public function index(ArticleRequest $request): JsonResponse
    {
        $data = $this->articleService->filter(
            $request->input('category'),
            $request->input('source'),
            $request->input('from_date'),
            $request->input('to_date')
        );
        return ApiResponse::success(data: $data, message: 'article list');
    }
}
