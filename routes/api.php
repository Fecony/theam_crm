<?php

use App\Http\Controllers\Api\Auth\GithubController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\ToggleAdminController;
use App\Http\Controllers\Api\UserController;
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

        Route::apiResource('photos', PhotoController::class)->only(['store', 'destroy']);

        Route::apiResource('customers', CustomerController::class);

        Route::group(['middleware' => 'isAdmin'], function () {
            Route::apiResource('users', UserController::class);
            Route::patch('/users/{user}/toggle_admin', ToggleAdminController::class);
        });
    });
});
