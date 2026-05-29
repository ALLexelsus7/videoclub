@extends('layouts.master')
{{-- Este es la vista con el form para editar --}}
@section('content')
<h1 class="text-2xl font-bold mb-6">✏️ Editar Libro</h1>

<form action="{{ url('/books/' . $book->id) }}" method="POST" class="max-w-md space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block text-sm font-medium text-gray-700">Título</label>
        <input type="text" name="title" value="{{ $book->title }}" class="mt-1 block w-full border-gray-300 rounded shadow-sm p-2 border" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Autor</label>
        <input type="text" name="author" value="{{ $book->author }}" class="mt-1 block w-full border-gray-300 rounded shadow-sm p-2 border" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Año</label>
        <input type="number" name="year" value="{{ $book->year }}" class="mt-1 block w-full border-gray-300 rounded shadow-sm p-2 border" required>
    </div>
    <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Actualizar Libro</button>
</form>
@endsection