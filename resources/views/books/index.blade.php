@extends('layouts.master')
{{-- Aqui se muestra el catalogo de libros --}}
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">📚 Catálogo de Libros</h1>
    <a href="{{ url('/books/create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Registrar Libro
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    @foreach($books as $book)
        <div class="bg-gray-50 p-4 rounded shadow border flex flex-col justify-between">
            <div>
                <h3 class="text-lg font-bold text-blue-600 mb-1">{{ $book->title }}</h3>
                <p class="text-sm text-gray-600"><strong>Autor:</strong> {{ $book->author }}</p>
                <p class="text-sm text-gray-500"><strong>Año:</strong> {{ $book->year }}</p>
            </div>
            
            <div class="mt-4 flex justify-between space-x-2">
                <a href="{{ url('/books/' . $book->id . '/edit') }}" class="text-yellow-600 hover:underline text-sm font-bold">Editar</a>
                
                <form action="{{ url('/books/' . $book->id) }}" method="POST" onsubmit="return confirm('¿Eliminar libro?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline text-sm font-bold">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection