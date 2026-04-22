@extends('layouts.master')

@section('content')
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach( $arrayPeliculas as $key => $pelicula )
        <div class="text-center">
            <a href="{{ url('/catalog/show/' . $key ) }}">
                <img src="{{$pelicula['poster']}}" class="h-64 mx-auto shadow-lg hover:opacity-75 transition">
                <h4 class="mt-2 text-lg font-semibold leading-tight">{{$pelicula['title']}}</h4>
            </a>
        </div>
        @endforeach
    </div>
@endsection