<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);           // Ver lista
Route::post('/tasks', [TaskController::class, 'store']);     // Crear
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']); // Borrar

// Ruta para MOSTRAR el formulario de edición
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);

// Ruta para PROCESAR la actualización (Notar que es PUT)
Route::put('/tasks/{id}', [TaskController::class, 'update']);