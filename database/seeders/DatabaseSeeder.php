<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie; // Importo el modelo Movie para poder usarlo en el seeder
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book; // Importo el modelo Book y Sales para poder usarlo en el seeder
use App\Models\Sale;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */  

    // Función para insertar el catálogo de películas en la tabla movies
    private function seedCatalog() {
        
        // Insertamos el array
        $arrayPeliculas = [
            [
                'title' => 'The Godfather',
                'year' => '1972',
                'director' => 'Francis Ford Coppola',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => false,
                'synopsis' => 'Don Vito Corleone...'
            ],
            [
                'title' => 'The Shawshank Redemption',
                'year' => '1994',
                'director' => 'Frank Darabont',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => true,
                'synopsis' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'
            ],
            [
                'title' => 'The Dark Knight',
                'year' => '2008',
                'director' => 'Christopher Nolan',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => false,
                'synopsis' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.'
            ],
            [
                'title' => 'Pulp Fiction',
                'year' => '1994',
                'director' => 'Quentin Tarantino',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => true,
                'synopsis' => "The lives of two mob hitmen, a boxer, a gangster's wife, and a pair of diner bandits intertwine in four tales of violence and redemption."
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'year' => '2003',
                'director' => 'Peter Jackson',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => false,
                'synopsis' => "Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring."
            ],
            [
                'title' => 'Forrest Gump',
                'year' => '1994',
                'director' => 'Robert Zemeckis',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => true,
                'synopsis' => "The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart"
            ],
            [
                'title' => 'Inception',
                'year' => '2010',
                'director' => 'Christopher Nolan',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => false,
                'synopsis' => "A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster."
            ],
            [
                'title' => 'The Matrix',
                'year' => '1999',
                'director' => 'Lana Wachowski, Lilly Wachowski',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => true,
                'synopsis' => "A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers."
            ]
        
        ];

        //Borro el contenido de la tabla
        Movie::truncate();
        
        foreach ($arrayPeliculas as $pelicula) {
            $m = new Movie;
            $m->title = $pelicula['title'];
            $m->year = $pelicula['year'];
            $m->director = $pelicula['director'];
            $m->poster = $pelicula['poster'];
            $m->rented = $pelicula['rented'];
            $m->synopsis = $pelicula['synopsis'];
            $m->save();
        }
    }

    // Funcion principal del seeder que corre las funciones internas o externasque le ponga
    // se ejecuta al llamar a php artisan db:seed o php artisan db:seed --class=SeederExterno
    public function run(): void
    {
        //OJO, comento lo que no quiero que se ejecute al hacer "php artisan db:seed"

        // Llamo a la función para insertar el catálogo de películas
        self::seedCatalog();
        $this->command->info('Tabla catálogo inicializada con datos!');        

        //Llamo al factory de book para crear 8 registros
        Book::factory(8)->create();

        //Llamo al factory de sale para crear 10 registros
        Sale::factory(10)->create();

    }
    
}

/*Ejecuto php artisan db:seed para poblar la base de datos
Verifico en terminal Laragon con select * from movies \G;
o con php artisan tinker con App\Models\Movie::all(); */