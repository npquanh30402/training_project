<?php

use App\Http\Controllers\Api\UserInstructorApiController;
use App\Http\Controllers\Api\ProductApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers\Api')->group(function () {
    //Route::apiResource('products', ProductApiController::class);

    // Products
    Route::get('products', [ProductApiController::class, 'index']);
    Route::get('products/{id}', [ProductApiController::class, 'show']);
    Route::post('products', [ProductApiController::class, 'store']);
    Route::put('products/{id}', [ProductApiController::class, 'update']);
    Route::delete('products/{id}', [ProductApiController::class, 'destroy']);

    // Users - Instructors
    Route::get('users/{user_type}', [UserInstructorApiController::class, 'index']);
    Route::post('users', [UserInstructorApiController::class, 'store']);
    Route::put('users/{id}', [UserInstructorApiController::class, 'update']);
    Route::delete('users/{id}', [UserInstructorApiController::class, 'destroy']);
});
