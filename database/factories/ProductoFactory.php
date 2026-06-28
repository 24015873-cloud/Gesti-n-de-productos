<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'nombre' => fake()->words(3, true),
        'descripcion' => fake()->sentence(10),
        'precio' => fake()->randomFloat(2, 10, 5000),
        'categoria_id' => fake()->numberBetween(1, 3),
    ];
}
}
