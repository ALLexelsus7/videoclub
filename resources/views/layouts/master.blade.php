<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>
    <!-- uso TAILWIND en lugar de BOOTSTRAP -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    
    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between">
            <a href="{{ url('/') }}" class="font-bold text-xl">🎬 Videoclub</a>
            <!-- Uso {{ url('')}} para obtener la ruta absoluta de la vista -->
            <div class="space-x-4">
                <a href="{{ url('/catalog') }}" class="hover:underline">Catálogo</a>
                <a href="{{ url('/catalog/create') }}" class="hover:underline">Nueva Película</a>
                <a href="{{ url('/posts') }}" class="hover:underline">Posts</a>
                <a href="{{ url('/login') }}" class="hover:underline">Login</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-10 p-6 bg-white rounded shadow">
        <!-- Aqui se pone el contenido de la pagina que puse con @section('content') en cada vista -->
        @yield('content')
    </main>

</body>
</html>