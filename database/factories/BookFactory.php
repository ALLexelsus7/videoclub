<?php
// con "php artisan make:model Book -mf" hice la migracion, el modelo y el factory
namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Con faker se generaran datos
            'title' => $this->faker->sentence(3),                // Titulo de 3 palabras
            'author' => $this->faker->name(),                   // Nombre de autor ficticio
            'year' => $this->faker->numberBetween(1900, 2026), // Año aleatorio
        ];
    }
}