<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Mostrar la lista
    public function index()
    {
        $tasks = Task::all(); // Obtiene todas las tareas de la BD
        return view('tasks', ['tasks' => $tasks]); // Las envía a la vista 'tasks'
    }

    // Guardar nueva tarea
    public function store(Request $request)
    {
        // 1. Validar (si falla, Laravel redirige atrás con errores automáticamente)
        $request->validate([
            'name' => 'required|max:255'
        ]);

        // 2. Crear
        Task::create([
            'name' => $request->input('name')
        ]);

        // 3. Redirigir
        return redirect('/');
    }

    // Eliminar tarea
    public function destroy($id)
    {
        $task = Task::findOrFail($id); // Busca por ID o falla
        $task->delete();
        return redirect('/');
    }
}