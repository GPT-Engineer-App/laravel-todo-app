<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/task', [TodoController::class, 'store']);
Route::delete('/task/{id}', [TodoController::class, 'destroy']);
Route::put('/task/{id}', [TodoController::class, 'update']);