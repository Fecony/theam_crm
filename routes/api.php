<?php

use App\Http\Controllers\Api\Auth\GithubController;
use App\Http\Controllers\Api\Auth\LogoutController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('/github', [GithubController::class, 'redirect'])->name('login');
        Route::get('/github/callback', [GithubController::class, 'callback']);
    });

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::delete('/logout', LogoutController::class);
    });
});
