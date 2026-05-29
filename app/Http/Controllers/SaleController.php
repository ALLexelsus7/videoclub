<?php
// con "php artisan make:controller SaleController"
//Manejo de la logica y CRUD
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale; //Recuerda agregar el modelo que se usa

class SaleController extends Controller
{
    // Vista de lista de ventas y calcular ingresos totales
    public function index() {
        $sales = Sale::all();
        
        // Calculamos el total de ingresos multiplicando cantidad * precio para cada registro
        $totalRevenue = $sales->sum(function($sale) {
            return $sale->quantity * $sale->price;
        });

        return view('sales.index', compact('sales', 'totalRevenue'));
    }

    // Vista de formulario de registro de venta
    public function create() {
        return view('sales.create');
    }

    // Logica para registrar la venta en la BD
    public function store(Request $request) {
        $request->validate([
            'product' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Sale::create($request->all());
        return redirect('/sales')->with('info', 'Venta registrada con éxito');
    }
}
