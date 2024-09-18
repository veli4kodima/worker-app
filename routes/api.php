<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/workers', [\App\Http\Controllers\API\WorkerController::class, 'index']);
Route::get('/workers/{worker}', [\App\Http\Controllers\API\WorkerController::class, 'show']);
Route::post('/workers', [\App\Http\Controllers\API\WorkerController::class, 'store']);
Route::patch('/workers/{worker}', [\App\Http\Controllers\API\WorkerController::class, 'update']);
Route::delete('/workers/{worker}', [\App\Http\Controllers\API\WorkerController::class, 'destroy']);
