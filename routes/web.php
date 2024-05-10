<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todo', [TodoController::class, 'store']);
Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
Route::put('/todo/{id}', [TodoController::class, 'update']);