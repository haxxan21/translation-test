<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::prefix('translations')->middleware('auth:sanctum')->group(function () {
    Route::get('/export', [TranslationController::class, 'export']);
    Route::get('/', [TranslationController::class, 'search']);
    Route::get('/{id}', [TranslationController::class, 'find']);
    Route::post('/', [TranslationController::class, 'create']);
    Route::put('/{id}', [TranslationController::class, 'update']);
});
