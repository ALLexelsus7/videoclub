@extends('layouts.master')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">💰 Registro de Ventas</h1>
    <a href="{{ url('/sales/create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-bold">
        + Registrar Venta
    </a>
</div>

<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6 shadow-sm flex justify-between items-center">
    <div>
        <p class="text-sm font-semibold uppercase tracking-wide">Total de Ingresos Calculados</p>
        <p class="text-3xl font-extrabold">${{ number_format($totalRevenue, 2) }}</p>
    </div>
    <div class="text-3xl">💵</div>
</div>

<div class="bg-white rounded shadow overflow-x-auto border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Precio Unitario</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($sales as $sale)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $sale->product }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $sale->quantity }}</td>
                    <td class="px-6 py-4 text-gray-600">${{ number_format($sale->price, 2) }}</td>
                    <td class="px-6 py-4 font-bold text-gray-800">${{ number_format($sale->quantity * $sale->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection