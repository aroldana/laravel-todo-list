<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Editar Tarea</h1>

        <form action="/tasks/{{ $task->id }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT') <input type="text" name="name" value="{{ $task->name }}" 
                   class="border rounded px-3 py-2 focus:outline-none focus:border-blue-500" required>
            
            <div class="flex gap-2">
                <a href="/" class="flex-1 text-center bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancelar
                </a>
                <button type="submit" class="flex-1 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>

</body>
</html>