<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);           // Ver lista
Route::post('/tasks', [TaskController::class, 'store']);     // Crear
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']); // Borrar