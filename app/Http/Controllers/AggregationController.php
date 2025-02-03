<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Jobs\AggregateArticlesJob;
use App\Services\AggregationService;
use Illuminate\Http\Client\ConnectionException;


class AggregationController extends Controller
{

    public function __construct(
        public AggregationService $aggregationService
    )
    {

    }

    /**
     * @throws ConnectionException
     */
    public function aggregate()
    {
//        $this->aggregationService->aggregate();

        return ApiResponse::success(message: __('message.success.aggregation'));
    }
}
