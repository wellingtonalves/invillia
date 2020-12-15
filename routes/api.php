<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('App\Http\Controllers\Api')->group(function () {

    Route::post('login', 'AuthApiController@login');

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('people', 'PersonApiController')->only(['index', 'show']);
        Route::apiResource('ship-orders', 'ShipOrderApiController')->only(['index', 'show']);
        Route::apiResource('logs', 'LogApiController')->only(['index', 'show']);
        Route::get('user', 'AuthApiController@user');
    });
});
