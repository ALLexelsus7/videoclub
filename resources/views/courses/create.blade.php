@extends('layouts.master')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-800">📝 Registrar Nuevo Curso</h1>

<div class="bg-white p-6 rounded shadow-md max-w-lg border border-gray-200">
    <form action="{{ url('/courses') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del Curso</label>
            <input type="text" name="title" class="w-full border-gray-300 rounded shadow-sm p-2 border focus:ring focus:ring-indigo-200" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
            <textarea name="description" rows="3" class="w-full border-gray-300 rounded shadow-sm p-2 border focus:ring focus:ring-indigo-200"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Duración (en horas)</label>
            <input type="number" name="duration" min="1" class="w-full border-gray-300 rounded shadow-sm p-2 border focus:ring focus:ring-indigo-200" required>
        </div>
        <div class="pt-2">
            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 font-bold transition-colors">
                Guardar Curso
            </button>
        </div>
    </form>
</div>
@endsection