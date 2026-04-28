@extends('layouts.master')

@section('content')
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Ya no se usa $arrayPeliculas as $key => $pelicula -->
        @foreach( $arrayPeliculas as $pelicula ) 
        <div class="text-center">
            <!-- Ya no uso $key sino $pelicula->id para generar el enlace a la vista show -->
            <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">               
                <img src="{{$pelicula['poster']}}" class="h-64 mx-auto shadow-lg hover:opacity-75 transition">
                <h4 class="mt-2 text-lg font-semibold leading-tight">{{$pelicula->title}}</h4>
                <!-- Ahora ya no uso $pelicula['title'] sino $pelicula->title -->
            </a>
        </div>
        @endforeach
    </div>
@endsection