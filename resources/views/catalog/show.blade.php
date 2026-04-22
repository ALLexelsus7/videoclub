@extends('layouts.master')

@section('content')
    <h1 class="text-3xl font-bold">Vista detalle película</h1>
    <p class="mt-4 text-blue-600 font-mono text-xl">ID de la película: {{ $id }}</p> 
    <!-- con {{ $id }} muestra el id que pase por url -->
@endsection