<?php
// con 'php artisan make:controller CourseController'
// con la logica del CRUD y funciones
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course; //Recuerda agregar el modelo!

class CourseController extends Controller
{
    // Vista para mostrar catalogo y duracion total
    public function index() {
        $courses = Course::all();
        $totalDuration = $courses->sum('duration'); // Suma la columna 'duration' de todos los registros

        return view('courses.index', compact('courses', 'totalDuration'));
    }

    // Vista con formulario para registrar
    public function create() {
        return view('courses.create');
    }

    // Funcion para guardar en base de datos
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'duration' => 'required|integer|min:1',
        ]);

        Course::create($request->all());
        return redirect('/courses')->with('info', 'Curso registrado con éxito');
    }

    // Funcion para eliminar curso
    public function destroy($id) {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/courses')->with('info', 'Curso eliminado con éxito');
    }
}
