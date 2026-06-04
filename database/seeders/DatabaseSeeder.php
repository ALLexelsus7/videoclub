<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie; // Importo el modelo Movie para poder usarlo en el seeder
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book; // Importo el modelo Book y Sales para poder usarlo en el seeder
use App\Models\Sale;
use App\Models\Course; // Importo el modelo Course para poder usarlo en el seeder


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
                'poster' => 'https://upload.wikimedia.org/wikipedia/en/a/af/The_Godfather%2C_The_Game.jpg',
                'rented' => false,
                'synopsis' => 'Don Vito Corleone...'
            ],
            [
                'title' => 'The Shawshank Redemption',
                'year' => '1994',
                'director' => 'Frank Darabont',
                'poster' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCf8aL2PEiat-7ptkr0zZxOPBY8SqbXaqp3A&s',
                'rented' => true,
                'synopsis' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'
            ],
            [
                'title' => 'The Dark Knight',
                'year' => '2008',
                'director' => 'Christopher Nolan',
                'poster' => 'https://m.media-amazon.com/images/S/pv-target-images/8753733ac616155963cc440c3cf5367f45d7685b672c5b9c35bc7f182aec17c4.jpg',
                'rented' => false,
                'synopsis' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.'
            ],
            [
                'title' => 'Pulp Fiction',
                'year' => '1994',
                'director' => 'Quentin Tarantino',
                'poster' => 'https://images.cdn1.buscalibre.com/fit-in/360x360/94/ba/94ba7a9d4648bcdaad21aab14a44850d.jpg',
                'rented' => true,
                'synopsis' => "The lives of two mob hitmen, a boxer, a gangster's wife, and a pair of diner bandits intertwine in four tales of violence and redemption."
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'year' => '2003',
                'director' => 'Peter Jackson',
                'poster' => 'https://m.media-amazon.com/images/S/pv-target-images/7e99f28ca232bb0e7b95039dec7fb562f6686c6f5a37ad32aa99a0de18fa064e.jpg',
                'rented' => false,
                'synopsis' => "Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring."
            ],
            [
                'title' => 'Forrest Gump',
                'year' => '1994',
                'director' => 'Robert Zemeckis',
                'poster' => 'https://m.media-amazon.com/images/I/91++WV6FP4L._AC_UF894,1000_QL80_.jpg',
                'rented' => true,
                'synopsis' => "The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart"
            ],
            [
                'title' => 'Inception',
                'year' => '2010',
                'director' => 'Christopher Nolan',
                'poster' => 'https://m.media-amazon.com/images/I/912AErFSBHL.jpg',
                'rented' => false,
                'synopsis' => "A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster."
            ],
            [
                'title' => 'The Matrix',
                'year' => '1999',
                'director' => 'Lana Wachowski, Lilly Wachowski',
                'poster' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDU4yn7nfGEGlsDyU3O5cP_9sr42t89JUdKg&s',
                'rented' => true,
                'synopsis' => "A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers."
            ],
            [
                'title' => 'Greyscale',
                'year' => '1999',
                'director' => 'Gray',
                'poster' => 'https://picsum.photos/300/450?grayscale',
                'rented' => false,
                'synopsis' => "Esta imagen cambia cada vez que se actualiza."
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

        // LLamo al factory course para crear 10 registros
        Course::factory(10)->create();
    }
    
}

/*Ejecuto php artisan db:seed para poblar la base de datos
Verifico en terminal Laragon con select * from movies \G;
o con php artisan tinker con App\Models\Movie::all(); */