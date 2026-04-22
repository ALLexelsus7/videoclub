@extends('layouts.master')

@section('content')
    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/3">
            <img src="{{$pelicula['poster']}}" class="w-full rounded shadow-xl">
        </div>
        
        <div class="md:w-2/3 md:ml-10 mt-5 md:mt-0">
            <h1 class="text-4xl font-bold">{{$pelicula['title']}}</h1>
            <h2 class="text-xl text-gray-600 mt-2">Año: {{$pelicula['year']}}</h2>
            <h2 class="text-xl text-gray-600">Director: {{$pelicula['director']}}</h2>
            
            <p class="mt-4 text-gray-700"><strong>Resumen:</strong> {{$pelicula['synopsis']}}</p>
            
            <p class="mt-4 italic">
                <strong>Estado:</strong> 
                @if($pelicula['rented'])
                    <span class="text-red-600 font-bold">Película actualmente alquilada</span>
                @else
                    <span class="text-green-600 font-bold">Película disponible</span>
                @endif
            </p>

            <div class="mt-6 space-x-2">
                @if($pelicula['rented'])
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Devolver película</button>
                @else
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Alquilar película</button>
                @endif
                <a href="{{ url('/catalog/edit/' . $id ) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar película</a>
                <a href="{{ url('/catalog') }}" class="border border-gray-400 px-4 py-2 rounded hover:bg-gray-100">Volver al listado</a>
            </div>
        </div>
    </div>
@endsection