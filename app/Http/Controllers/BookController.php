<?php
// con "php artisan make:controller BookController"
// Aqui se hace todo el CRUD
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book; //Agrego el modelo para poderlo usar en la logica

class BookController extends Controller
{
    // Mostrar lista de libros
    public function index() {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Vista con formulario de crear
    public function create() {
        return view('books.create');
    }

    // Logica para registrar el libro en la BD
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
        ]);

        Book::create($request->all());
        return redirect('/books')->with('info', 'Libro registrado con éxito');
    }

    // Vista con formulario de editar
    public function edit($id) {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // Logica para actualizar el libro en la BD
    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect('/books')->with('info', 'Libro actualizado con éxito');
    }

    // Logica para eliminar el libro
    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/books')->with('info', 'Libro eliminado con éxito');
    }
}
