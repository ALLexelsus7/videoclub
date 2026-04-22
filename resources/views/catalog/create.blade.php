@extends('layouts.master')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Añadir película</h1>
    
    <form action="#" method="POST" class="space-y-4">
        @csrf {{-- Siempre necesario en formularios Laravel --}}
        
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

        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition">
            Añadir película
        </button>
    </form>
</div>
@endsection