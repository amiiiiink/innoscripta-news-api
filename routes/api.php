<?php

use App\Http\Controllers\AggregationController;
use Illuminate\Support\Facades\Route;

Route::get('/article/aggregation', [AggregationController::class, 'aggregate']);
