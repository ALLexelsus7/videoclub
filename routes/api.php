<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Rutas publicas para que cualquiera pueda ver el catalogo y las peliculas
Route::get('v1/catalog', [App\Http\Controllers\APICatalogController::class, 'index']);
Route::get('v1/catalog/{id}', [App\Http\Controllers\APICatalogController::class, 'show']);
// Rutas protegidas para que no cualquiera pueda modificar el catalogo (Ejercicio pide auth.basic.once)
Route::middleware('auth.basic')->group(function () {
    Route::post('v1/catalog', [APICatalogController::class, 'store']);
    Route::put('v1/catalog/{id}', [APICatalogController::class, 'update']);
    Route::delete('v1/catalog/{id}', [APICatalogController::class, 'destroy']);
    Route::put('v1/catalog/{id}/rent', [APICatalogController::class, 'putRent']);
    Route::put('v1/catalog/{id}/return', [APICatalogController::class, 'putReturn']);
});