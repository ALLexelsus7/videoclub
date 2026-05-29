<?php
// con "php artisan make:model Sale -mf" para el modelo, migracion y factory
namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Creacion de datos falsos
        return [
            'product' => $this->faker->randomElement(['Alquiler: Avatar', 'Compra: Popcorn XL', 'Alquiler: Inception', 'Suscripción Mensual', 'Compra: Refresco']),
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(2, 2, 20), // Precio decimal entre 2.00 y 20.00
        ];
    }
}
