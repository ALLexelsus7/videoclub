<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    private $arrayPeliculas = array(
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
        // ... puedes añadir las otras 8 películas del ejercicio aquí ...
    );

    public function getIndex()
    {
        return view('catalog.index', ['arrayPeliculas' => $this->arrayPeliculas]);
    }

    public function getShow($id)
    {
        // Pasamos la película específica usando el índice del array
        return view('catalog.show', ['pelicula' => $this->arrayPeliculas[$id], 'id' => $id]);
    }

    public function getEdit($id)
    {
        return view('catalog.edit', ['pelicula' => $this->arrayPeliculas[$id], 'id' => $id]);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }
}
