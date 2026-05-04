<?php
// 🐵 Clase 10 Act2 
//php artisan make:controller ContactController
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getForm()
    {
        return view('contactos.contact');
    }

    public function postForm(Request $request)
    {
        // Validacion
        $request->validate([
            'nombre'  => 'required|min:3', // Minimo 3 caracteres
            'email'   => 'required|email', // Email valido
            'mensaje' => 'required|min:10', // Minimo 10 caracteres
        ]);
        // Si la validación falla, Laravel redirige automáticamente de 
        // vuelta al formulario con los errores y los datos antiguos.

        // Validacion exitosa
        // Redirige a la misma pagina del formulario (usa la clave 'exito' para la vista)
        return back()->with('exito', '¡Formulario validado con éxito! Gracias, ' . $request->input('nombre'));
    }
}
