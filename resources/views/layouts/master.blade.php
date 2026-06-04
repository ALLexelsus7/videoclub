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
                {{-- SOLO PARA USUARIOS LOGUEADOS --}}
                @if( Auth::check() )
                <a href="{{ url('/catalog') }}" class="hover:underline">Catálogo</a>
                <a href="{{ url('/catalog/create') }}" class="hover:underline">Nueva Película</a>
                <a href="{{ url('/books') }}" class="hover:underline">Libros</a>
                <a href="{{ url('/sales') }}" class="hover:underline">Ventas</a>
                <a href="{{ url('/courses') }}" class="hover:underline">Cursos</a>
                <a href="{{ url('/posts') }}" class="hover:underline">Posts</a>
                <a href="{{ url('/contacto') }}" class="hover:underline">Contacto</a>
                {{-- Formulario de Logout (Requisito de seguridad) --}}
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf {{-- Protección contra CSRF --}}
                        <button type="submit" class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded text-sm font-bold ml-4">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    {{-- SOLO PARA INVITADOS --}}
                    <a href="{{ url('/login') }}" class="hover:underline">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-10 p-6 bg-white rounded shadow">
        {{-- Aqui se pone el contenido de la pagina que puse con @section('content') en cada vista --}} 
        {{-- @include('partials.alert') --}}
        {{-- Este es el contenedor de alertas --}}
        @if (session('info'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm rounded flex justify-between items-center" role="alert">
                <div class="flex items-center">
                    <span class="text-xl mr-2">✅</span>
                    <span class="block sm:inline font-semibold">{{ session('info') }}</span>
                </div>
                <button onclick="this.parentElement.style.display='none'" class="text-green-700 hover:text-green-900 font-bold text-xl leading-none outline-none focus:outline-none">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>