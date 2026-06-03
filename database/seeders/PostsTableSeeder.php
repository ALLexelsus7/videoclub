<?php
// 🐵 Clase 9 Act 2
// Creo el seeder con php artisan make:seeder PostsTableSeeder
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post; // Importo el modelo Post para poder usarlo en el seeder

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpia la tabla antes de insertar
        Post::truncate();

        // Inserta 5 posts de ejemplo
        for ($i = 1; $i <= 5; $i++) {
            Post::create([
                'title' => "Mi post de ejemplo número $i",
                'body' => "Este es el cuerpo del post número $i.",
                'published_at' => now(), // Fecha actual
            ]);
        }

        // Muestra un mensaje en la consola al finalizar
        $this->command->info('Tabla posts inicializada con datos!');
    }
}

// Lo ejecuto con php artisan db:seed --class=PostsTableSeeder 
// O en su lugar, se llama a este seeder desde el DatabaseSeeder.php para que se ejecute junto con otros seeders
// con $this->call(PostsTableSeeder::class); dentro del método run() del DatabaseSeeder.php
// Finalmente se ejecuta php artisan db:seed para poblar la base de datos.
// Verifico en terminal Laragon con select * from posts \G; 
// o con php artisan tinker con App\Models\Post::all(); para ver los posts insertados.