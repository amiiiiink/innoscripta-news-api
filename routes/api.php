<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\V1\ArticleController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/token', [AuthController::class, 'generateToken'])->name('login');


Route::middleware(['auth:sanctum'])->group(function () {
    // Protected Post API routes
    Route::post('articles', [ArticleController::class, 'index']);

});

