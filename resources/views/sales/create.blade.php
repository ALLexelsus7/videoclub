@extends('layouts.master')

@section('content')
<h1 class="text-2xl font-bold mb-6">🛒 Registrar Nueva Venta</h1>

<form action="{{ url('/sales') }}" method="POST" class="max-w-md space-y-4">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-700">Producto / Servicio</label>
        <input type="text" name="product" placeholder="Ej: Alquiler Película X" class="mt-1 block w-full border-gray-300 rounded shadow-sm p-2 border" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Cantidad</label>
        <input type="number" name="quantity" min="1" value="1" class="mt-1 block w-full border-gray-300 rounded shadow-sm p-2 border" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Precio por Unidad ($)</label>
        <input type="number" name="price" step="0.01" min="0" placeholder="0.00" class="mt-1 block w-full border-gray-300 rounded shadow-sm p-2 border" required>
    </div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-bold">Procesar Venta</button>
</form>
@endsection