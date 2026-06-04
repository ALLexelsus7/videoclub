@extends('layouts.master')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">🎓 Catálogo de Cursos</h1>
    <a href="{{ url('/courses/create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 font-bold">
        + Nuevo Curso
    </a>
</div>

<div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 rounded mb-6 shadow-sm flex justify-between items-center">
    <div>
        <p class="text-sm font-semibold uppercase tracking-wide">Duración Total del Catálogo</p>
        <p class="text-3xl font-extrabold">{{ $totalDuration }} Horas</p>
    </div>
    <div class="text-4xl">⏱️</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($courses as $course)
        <div class="bg-white p-5 rounded-lg shadow-md border border-gray-200 flex flex-col justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $course->title }}</h3>
                <p class="text-sm text-gray-600 mb-4">{{ Str::limit($course->description, 80) }}</p>
                <span class="inline-block bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full font-semibold">
                    ⏳ {{ $course->duration }} hrs
                </span>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-end">
                <form action="{{ url('/courses/' . $course->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este curso?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-bold flex items-center gap-1">
                        🗑️ Eliminar
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection