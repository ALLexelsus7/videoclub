<?php

use Illuminate\Support\Facades\Route;

//Esta es la pantalla inicial de bienvenida de laravel por default
/*Route::get('/', function () {
    return view('welcome');
});*/

//🐵 Ejercicio 1.2 - Definición de las rutas
// Pantalla principal
Route::get('/', function () {
    return view('home');
});

// Login y Logout
Route::get('login', function () { //Puedo no poner la '/' inicial
    return view('auth.login'); //Uso un '.' en vez de la '/' de subcarpeta
});

Route::get('logout', function () {
    return "Logout usuario";
});

// Catálogo
Route::get('catalog', function () {
    return view('catalog.index');
});

Route::get('catalog/show/{id}', function ($id) { //pongo en la url un numero catalog/show/#
    return view('catalog.show', ['id' => $id]);
});

Route::get('catalog/create', function () {
    return view('catalog.create');
});

Route::get('catalog/edit/{id}', function ($id) {
    return view('catalog.edit', ['id' => $id]);
});