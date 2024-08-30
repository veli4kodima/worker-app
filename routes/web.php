<?php

use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/workers', [WorkerController::class, 'index'])->name('worker.index');

Route::get('/workers/create', [WorkerController::class, 'create'])->name('worker.create');

Route::get('/workers/{worker}', [WorkerController::class, 'show'])->name('worker.show');

Route::post('/workers', [WorkerController::class, 'store'])->name('worker.store');

Route::put('/workers/{worker}/update', [WorkerController::class, 'update'])->name('worker.update');

Route::get('/workers/{worker}/edit', [WorkerController::class, 'edit'])->name('worker.edit');

Route::delete('/workers/{worker}/delete', [WorkerController::class, 'delete'])->name('worker.delete');
