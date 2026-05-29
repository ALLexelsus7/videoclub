<?php

use Illuminate\Support\Facades\Route;
//🐵 Ejercicio 2 Importo los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PostController;
// 🐵 Clase 10 Act2 Importo el controlador de Contacto para el formulario
use App\Http\Controllers\ContactController;
// 🐵 Clase 13 (CRUD libros)
use App\Http\Controllers\BookController;

//Ej 4 los usuarios logueados no puedan ver el login y register
Auth::routes();

//Esta es la pantalla inicial de bienvenida de laravel por default
/*Route::get('/', function () {
    return view('welcome');
});*/

//🐵 Ejercicio 1.2 - Definición de las rutas
// Pantalla principal
/*Route::get('/', function () {
    return view('home');
});*/

// Login y Logout
/*Route::get('login', function () { //Puedo no poner la '/' inicial
    return view('auth.login'); //Uso un '.' en vez de la '/' de subcarpeta
});

Route::get('logout', function () {
    return "Logout usuario";
});*/

// Catálogo
/*Route::get('catalog', function () {
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
});*/

//🐵 Ejercicio 2
// Ruta Home actualizada [Ruta abierta] getHome redirige a getIndex del CatalogController
Route::get('/', [App\Http\Controllers\HomeController::class, 'getHome']);
//Rutas Catalogo y demas actualizadas  [Rutas protegidas por middleware de autenticación]
Route::group(['middleware' => 'auth'], function() {
    Route::get('catalog', [CatalogController::class, 'getIndex']);
    Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);
    Route::get('catalog/create', [CatalogController::class, 'getCreate']);
    Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);
    //🐵 Clase 9 Act3
    Route::get('/posts', [PostController::class, 'getIndex']);
    //🐵 Clase 10 Act2
    Route::get('/contacto', [ContactController::class, 'getForm']);
    Route::post('/contacto', [ContactController::class, 'postForm']);
    //🐵 Ejercicio 4
    Route::post('/catalog/create', [CatalogController::class, 'postCreate']); //post para enviar
    Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit']); // put para actualizar (con el parametro de id)
    //🐵 Ejercicio 5
    Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent']); 
    Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn']); 
    Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie']); // delete para eliminar
    //🐵 Clase 13 (CRUD libros)
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/create', [BookController::class, 'create']);
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/{id}/edit', [BookController::class, 'edit']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);
});

// Laravel Auth Routes (Breeze lo añade automáticamente al instalarlo)
//require __DIR__.'/auth.php';

/*Se usan los controladores porque...
Organización: El archivo de rutas no se llena de código CSS/HTML/Lógica.
Reutilización: Puedes usar el mismo método del controlador para diferentes cosas.
Escalabilidad: Cuando empecemos a usar la Base de Datos (en el siguiente ejercicio), 
toda la consulta de datos se hará en el controlador.
*/