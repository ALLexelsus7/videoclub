@extends('layouts.master')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b-2 border-blue-500 pb-2">
            Listado de Posts
        </h1>

        <div class="space-y-6">
            @forelse($posts as $post)
            <!-- Recorremos los posts y los mostramos -->
                <article class="p-6 bg-white rounded-lg shadow-md border border-gray-200">
                    <h2 class="text-2xl font-semibold text-blue-600 mb-2">
                        {{ $post->title }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $post->body }}
                    </p>
                    <div class="mt-4 text-sm text-gray-400">
                        Publicado el: {{ $post->created_at->format('d/m/Y') }}
                        <!-- Formateamos la fecha -->
                    </div>
                </article>
            @empty 
            <!-- Y si no hay posts disponibles... -->
                <p class="text-center text-gray-500">No hay posts disponibles todavía.</p>
            @endforelse
        </div>
    </div>
@endsection