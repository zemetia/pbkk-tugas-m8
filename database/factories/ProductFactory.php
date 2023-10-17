<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Http\Module\Product\Domain\Model\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->randomElement(['Baju', 'Celana', 'Sepatu', 'Topi', 'Sandal']),
            'price' => fake()->randomElement(['10000', '20000', '30000', '40000', '50000'])
        ];
    }
}
