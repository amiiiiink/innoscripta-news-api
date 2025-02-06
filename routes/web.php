<?php

use App\Jobs\AggregateArticlesJob;
use App\Services\Aggregation\AggregationService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    AggregateArticlesJob::dispatch(['technology', 'sports', 'health', 'business', 'entertainment', 'science', 'politics', 'finance'][array_rand(['technology', 'sports', 'health', 'business', 'entertainment', 'science', 'politics', 'finance'])]);
    return "innoscripta api case study";
});
