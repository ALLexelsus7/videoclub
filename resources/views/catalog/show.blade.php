@extends('layouts.master')

@section('content')

    {{-- Incluye la alerta si la hay --}}
    @include('partials.alert')

    {{-- Detalles de cada película --}}
    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/3">
            <img src="{{$pelicula->poster}}" class="w-full rounded shadow-xl">
        </div>
        
        <div class="md:w-2/3 md:ml-10 mt-5 md:mt-0">
            <h1 class="text-4xl font-bold">{{$pelicula->title}}</h1>
            <h2 class="text-xl text-gray-600 mt-2">Año: {{$pelicula->year}}</h2>
            <h2 class="text-xl text-gray-600">Director: {{$pelicula->director}}</h2>
            
            <p class="mt-4 text-gray-700"><strong>Resumen:</strong> {{$pelicula->synopsis}}</p>
            
            <p class="mt-4 italic">
                <strong>Estado:</strong> 
                @if($pelicula->rented)
                    <span class="text-red-600 font-bold">Película actualmente alquilada</span>
                @else
                    <span class="text-green-600 font-bold">Película disponible</span>
                @endif
            </p>

            <div class="mt-6 space-x-2">
                @if($pelicula->rented)
                    <form action="{{ action([App\Http\Controllers\CatalogController::class, 'putReturn'], ['id' => $pelicula->id]) }}" method="POST" style="display:inline">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Devolver película
                        </button>
                    </form>
                @else                   
                    <form action="{{ action([App\Http\Controllers\CatalogController::class, 'putRent'], ['id' => $pelicula->id]) }}" method="POST" style="display:inline">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Alquilar película
                        </button>
                    </form>                  
                @endif
                    {{-- Falta agregar que solo lo pueda hacer el admin --}}
                    <form action="{{ action([App\Http\Controllers\CatalogController::class, 'deleteMovie'], ['id' => $pelicula->id]) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Seguro que quieres eliminarla?')">
                        {{-- Agrego confirm() para preguntar antes de eliminar --}}
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                            Eliminar película
                        </button>
                    </form>
                <a href="{{ url('/catalog/edit/' . $pelicula->id ) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar película</a>
                <a href="{{ url('/catalog') }}" class="border border-gray-400 px-4 py-2 rounded hover:bg-gray-100">Volver al listado</a>
            </div>
        </div>
    </div>
@endsection