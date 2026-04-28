@extends('layouts.master')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Modificar película (ID: {{ $pelicula->id }})</h1>
    <!-- Aqui agrego $pelicula->id en lugar de solo $id -->
    
    <form action="#" method="POST" class="space-y-4">
        @csrf
        @method('PUT') {{-- Esto es vital para que Laravel sepa que es una edición --}}
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Año</label>
                <input type="text" name="year" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Director</label>
                <input type="text" name="director" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">URL del Poster</label>
            <input type="text" name="poster" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Resumen</label>
            <textarea name="synopsis" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
        </div>

        <button type="submit" class="w-full bg-yellow-500 text-white font-bold py-2 px-4 rounded hover:bg-yellow-600 transition">
            Modificar película
        </button>
    </form>
</div>
@endsection