<!-- 🐵 Clase 10 Act2 -->
@extends('layouts.master')

@section('content')

{{-- Bloque de mensaje de éxito --}}
@if(session('exito'))
<!-- usa la clave 'exito' definido en le controlador ContactController -->
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm rounded" role="alert">
        <p class="font-bold">¡Logrado!</p>
        <!-- Muestra el mensaje de éxito -->
        <p>{{ session('exito') }}</p>
    </div>
@endif

{{-- Bloque formulario --}}
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Contacto</h1>

    <form action="{{ url('/contacto') }}" method="POST" class="space-y-4">
        @csrf {{-- este un campo oculto que se utiliza para validar la solicitud POST 
                Es decir, Protege el sitio contra ataques de falsificación de 
                peticiones en sitios cruzados --}}

        <div>
            <label class="block text-sm font-medium">Nombre</label>
            <!-- con old('nombre') se muestra el valor anteriormente ingresado en el campo
                 para que el usuario no tenga que volver a escribirlo si hay un error de validación,
                y con @error('nombre') ... @enderror se muestra el mensaje de error si es que lo hay -->
            <input type="text" name="nombre" value="{{ old('nombre') }}" 
                   class="w-full border rounded p-2 @error('nombre') border-red-500 @enderror">
            @error('nombre')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" 
                   class="w-full border rounded p-2 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Mensaje</label>
            <textarea name="mensaje" rows="4" 
                      class="w-full border rounded p-2 @error('mensaje') border-red-500 @enderror">{{ old('mensaje') }}</textarea>
            @error('mensaje')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Enviar Mensaje
        </button>
    </form>
</div>
@endsection
<!-- Si la validación falla, Laravel redirige automáticamente de 
     vuelta al formulario con los errores y los datos antiguos. -->