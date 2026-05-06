<?php
// Ejercicio 5
// php artisan make:controller APICatalogController --api
// Este controlador sirve para manejar las rutas de la API RESTful para el catálogo de películas, 
// con métodos para listar, mostrar, crear, actualizar, eliminar, alquilar y devolver películas.
// Se usaria en caso de querer exponer una API para que otras aplicaciones puedan interactuar con el catálogo de películas
// , como una app movil, una smart TV, o incluso para que otros desarrolladores puedan usar la API en sus proyectos,
// ya que devuelve respuestas en JSON para que cualquiera pueda consumirla fácilmente sin GUI ni registrarse en la aplicación,
// mientras que el CatalogController se usaría para manejar las vistas y la lógica de la aplicación web interna.
/*
En el mundo real, estas rutas se consumen mediante JavaScript (usando fetch o axios).
El flujo es este:
La App móvil hace una petición a http://videoclub.test/api/v1/catalog.
Tu Laravel responde con el JSON (los datos puros).
La App móvil recibe esos datos y los "dibuja" con su propio diseño (un diseño de iPhone, por ejemplo).*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie; // Asegúrate de importar el modelo Movie

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Movie::all()); // Devuelve todas las películas en formato JSON
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $m = new Movie;
        $m->title = $request->title;
        $m->year = $request->year;
        $m->director = $request->director;
        $m->poster = $request->poster;
        $m->synopsis = $request->synopsis;
        $m->save();
        return response()->json(['error' => false, 'msg' => 'Película creada con éxito']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(Movie::findOrFail($id)); // Devuelve la película con el ID especificado en formato JSON
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $m = Movie::findOrFail($id);
        $m->update($request->all());
        return response()->json(['error' => false, 'msg' => 'Película actualizada con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $m = Movie::findOrFail($id);
        $m->delete();
        return response()->json(['error' => false, 'msg' => 'Película eliminada con éxito']);
    }

    /**
     * Mark the specified resource as rented.
     */
    public function putRent($id)
    {
        $m = Movie::findOrFail($id);
        $m->rented = true;
        $m->save();
        return response()->json(['error' => false, 'msg' => 'La película se ha marcado como alquilada']);
    }

    /**
    * Mark the specified resource as returned.
    */  
    public function putReturn($id)
    {
        $m = Movie::findOrFail($id);
        $m->rented = false;
        $m->save();
        return response()->json(['error' => false, 'msg' => 'La película se ha marcado como devuelta']);
    }
}

/*
Por último, utiliza cURL para comprobar el funcionamiento de las rutas que devuelven JSON. 
En PowerShell y VSCode usa curl.exe y en CMD solo curl.
Ej: 
curl.exe -X GET http://videoclub.test/api/v1/catalog/1
curl.exe -u admin@gmail.com:12345678 -X PUT http://videoclub.test/api/v1/catalog/1/rent

-i muestra las cabeceras de la respuesta, -H especifica que se acepta y se envía JSON, -X indica que es una petición PUT,
-d envía el nuevo título de la película en formato JSON, y la URL apunta a la ruta de actualización de la película con ID 21.
-u admin:admin es para autenticación básica, si la ruta está protegida por auth.basic, debes incluirlo para que la petición sea exitosa.
*/