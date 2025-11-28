<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi To-Do List Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Mis Tareas</h1>

        <form action="/tasks" method="POST" class="flex gap-2 mb-6">
            @csrf <input type="text" name="name" placeholder="Nueva tarea..." 
                   class="flex-1 border rounded px-3 py-2 focus:outline-none focus:border-blue-500" required>
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Agregar
            </button>
        </form>

        <ul class="space-y-3">
            @foreach ($tasks as $task)
                <li class="flex justify-between items-center bg-gray-50 p-3 rounded border">
                    <span>{{ $task->name }}</span>
                        <div class="flex gap-2">
                            <a href="/tasks/{{ $task->id }}/edit" class="text-blue-500 hover:text-blue-700 text-sm font-bold">
                                Editar
                            </a>

                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                </li>
            @endforeach
        </ul>
        
        @if($tasks->isEmpty())
            <p class="text-gray-400 text-center mt-4">No hay tareas pendientes.</p>
        @endif
    </div>

</body>
</html>