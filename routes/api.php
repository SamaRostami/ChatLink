<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\MessageController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::get('user/{user_id}', [UserController::class, 'show']);

    Route::group(['middleware' => ['auth:sanctum']], function () {

        Route::group(['prefix' => 'message', ], function () {
            Route::post('send', [MessageController::class, 'store']);
            Route::get('index', [MessageController::class, 'index']);
        });
    });
});

