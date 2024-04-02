<?php

use Illuminate\Http\Request;
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

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    //Route test connection
    Route::get('test', function () {
        return response()->json(['message' => 'API is working']);
    });

    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');
    Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('change-password', 'App\Http\Controllers\Auth\ChangePasswordController@changePassword');
        Route::post('logout', 'App\Http\Controllers\Auth\LogoutController@logout');
    });
});
