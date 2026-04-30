<?php
// Se hace el controlador con: php artisan make:controller PostController
// 🐵 Clase 9 Act3
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; // Importamos el modelo Post para poder usarlo en el controlador

class PostController extends Controller
{
    //Definimos el método getIndex que se encargará de mostrar la lista de posts
    // y lo llamo desde la ruta en web.php
    public function getIndex()
    {
        // Obtenemos todos los posts de la base de datos
        $posts = Post::all(); // Usando Eloquent equivalente a SELECT * FROM posts

        // Retornamos la vista pasándole los datos
        return view('posts.index', compact('posts'));
    }
}