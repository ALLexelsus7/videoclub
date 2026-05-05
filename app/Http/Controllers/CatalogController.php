<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie; // Importo el modelo Movie para poder usarlo en el controlador
use Illuminate\Http\Request;

class CatalogController extends Controller
{
   /* private $arrayPeliculas = array(

        // Ya no uso este array para mostrar las películas, sino que las 
        // obtengo de la base de datos con el modelo Movie y el seeder
        array(
            'title' => 'The Godfather',
            'year' => '1972',
            'director' => 'Francis Ford Coppola',
            'poster' => 'https://picsum.photos/300/450?grayscale',
            'rented' => false,
            'synopsis' => 'Don Vito Corleone, head of a mafia family, decides to hand over his empire to his youngest son Michael. However, his decision unintentionally puts the lives of his loved ones in grave danger.'
        ),
        array(
            'title' => 'The Shawshank Redemption',
            'year' => '1994',
            'director' => 'Frank Darabont',
            'poster' => 'https://picsum.photos/300/450?grayscale',
            'rented' => true,
            'synopsis' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'
        ),
        array(
            'title' => 'The Dark Knight',
            'year' => '2008',
            'director' => 'Christopher Nolan',
            'poster' => 'https://picsum.photos/300/450?grayscale',
            'rented' => false,
            'synopsis' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.'
        ),
        array(
            'title' => 'Pulp Fiction',
            'year' => '1994',
            'director' => 'Quentin Tarantino',
            'poster' => 'https://picsum.photos/300/450?grayscale',
            'rented' => true,
            'synopsis' => "The lives of two mob hitmen, a boxer, a gangster's wife, and a pair of diner bandits intertwine in four tales of violence and redemption."
        ),
         array(
            'title' => 'The Lord of the Rings: The Return of the King',
            'year' => '2003',
            'director' => 'Peter Jackson',
            'poster' => 'https://picsum.photos/300/450?grayscale',
            'rented' => false,
            'synopsis' => "Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring."
        ),
            array(
                'title' => 'Forrest Gump',
                'year' => '1994',
                'director' => 'Robert Zemeckis',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => true,
                'synopsis' => "The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart"
            ),
            array(
                'title' => 'Inception',
                'year' => '2010',
                'director' => 'Christopher Nolan',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => false,
                'synopsis' => "A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster."
            ),
             array(
                'title' => 'The Matrix',
                'year' => '1999',
                'director' => 'Lana Wachowski, Lilly Wachowski',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => true,
                'synopsis' => "A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers."
            )  
    );*/

    // En cada método del controlador, en lugar de usar el array de películas,
    // uso el modelo Movie para obtener las películas de la base de datos y pasarlas a las vistas correspondientes

    public function getIndex()
    {
        $movies = Movie::all(); // Trae TODAS las películas de la DB
        return view('catalog.index', ['arrayPeliculas' => $movies]);
        //return view('catalog.index', ['arrayPeliculas' => $this->arrayPeliculas]);`
    }

    public function getShow($id)
    {       
        $movie = Movie::findOrFail($id); // Busca por ID o da error 404 si no existe
        return view('catalog.show', ['pelicula' => $movie]);
        // Pasabamos la película específica usando el índice del array
        //return view('catalog.show', ['pelicula' => $this->arrayPeliculas[$id], 'id' => $id]);
    }

    public function getEdit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('catalog.edit', ['pelicula' => $movie]);
        //return view('catalog.edit', ['pelicula' => $this->arrayPeliculas[$id], 'id' => $id]);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    //🐵 Ejercicio 4
    //Método para procesar el formulario de creación de película
    public function postCreate(Request $request)
    {
        $movie = new Movie(); //Crea una nueva instancia del modelo Movie
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->rented = false; // Por defecto no está alquilada
        $movie->save(); // Guarda la nueva película en la base de datos

        //Al final redirige al catalogo con un mensaje de éxito usando flash session
        return redirect('/catalog')->with('info', 'La película se ha guardado correctamente'); 
    }

    //Metodo para procesar el formulario de edición de película (con el parametro de id)
    public function putEdit(Request $request, $id)
    {
        $movie = Movie::findOrFail($id); //findOrFail busca la película por ID o da error 404 si no existe
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();

        //Redirige segun la película editada con un mensaje de éxito usando flash session
        return redirect('/catalog/show/' . $id)->with('info', 'La película se ha modificado correctamente'); 
    }
}