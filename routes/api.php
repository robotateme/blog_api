<?php

use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\VideoPostsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/', [ContentController::class, 'index']);
    Route::get('/{postId}', [ContentController::class, 'comments']);
    Route::post('/comment/send/{postId}', [ContentController::class, 'comment']);
    Route::post('/comment/update/{postId}', [ContentController::class, 'commentUpdate']);
    Route::post('/comment/delete/{id}', [ContentController::class, 'commentDestroy']);

    Route::get('/news/{id}', [NewsController::class, 'show']);
    Route::post('/news/create', [NewsController::class, 'create']);
    Route::put('/news/update/{id}', [NewsController::class, 'update']);

    Route::get('/videos/{id}', [VideoPostsController::class, 'show']);
    Route::post('/videos/create', [VideoPostsController::class, 'create']);
    Route::put('/videos/update/{id}', [VideoPostsController::class, 'update']);
});
