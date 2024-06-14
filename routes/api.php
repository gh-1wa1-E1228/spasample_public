<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('api/article/list/{page?}/{limit?}/{category_id?}', [ArticleController::class, 'list'])->where([
    'page' => '[0-9]*',
    'limit' => '[0-9]*',
    'category_id' => '[0-9]*',
]);
Route::get('api/article/{id}', [ArticleController::class, 'detail'])->where([
    'id' => '[0-9]+',
]);
