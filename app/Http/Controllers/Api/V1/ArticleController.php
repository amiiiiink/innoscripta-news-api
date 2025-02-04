<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ArticleRequest;
use App\Services\Admin\LoginLogsService;
use App\Services\Api\ArticleService;


class ArticleController extends Controller
{
    public function __construct(public ArticleService $articleService)
    {
    }
    public function index(ArticleRequest $request)
    {
        $data = $this->ArticleService->filter(
            $request->input('category'),
            $request->input('source'),
            $request->input('from_date'),
            $request->input('to_date')
        );
        return ApiResponse::success(data: $data, message: 'article list');
    }
}
