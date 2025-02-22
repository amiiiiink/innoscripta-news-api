<?php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/token', [AuthController::class, 'generateToken'])->name('login');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('articles', [ArticleController::class, 'index']);
});

