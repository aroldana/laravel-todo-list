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

    // 1. Buscar la tarea y mandar la vista de edición
    public function edit($id)
    {
        $task = Task::findOrFail($id); // Si no existe el ID, lanza error 404
        return view('edit', ['task' => $task]);
    }

    // 2. Recibir los datos y actualizar la BD
    public function update(Request $request, $id)
    {
        // Validamos igual que al crear
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $task = Task::findOrFail($id);
        
        // Aquí ocurre la magia: actualizamos los campos
        $task->update([
            'name' => $request->input('name')
        ]);

        return redirect('/'); // Nos devolvemos a la lista principal
    }

    // Eliminar tarea
    public function destroy($id)
    {
        $task = Task::findOrFail($id); // Busca por ID o falla
        $task->delete();
        return redirect('/');
    }
}