<?php


use App\Http\Controllers\Api\V1\ArticleController;
use Illuminate\Support\Facades\Route;


Route::post('articles', [ArticleController::class, 'index']);
