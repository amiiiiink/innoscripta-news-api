<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Services\AggregationService;
use App\Services\NewsApiService;
use App\Services\TheGuardianService;
use Illuminate\Http\Client\ConnectionException;


class AggregationController extends Controller
{

    public function __construct(
        public AggregationService $aggregationService,
        public NewsApiService     $newsApiService,
        public TheGuardianService $theGuardianService)
    {

    }

    /**
     * @throws ConnectionException
     */
    public function aggregate()
    {
        $this->aggregationService->aggregate();
        return ApiResponse::success(message: __('message.success.aggregation'));
    }
}
