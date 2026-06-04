<?php
// con 'php artisan make:model Course -mf' hago el modelo, migracion y factory
namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Curso de ' . $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(2),
            'duration' => $this->faker->numberBetween(2, 36), // en horas
        ];
    }
}
