<?php

namespace Database\Factories;

use App\Enums\EStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'product_name' => fake()->word(),
            'product_description' => fake()->words(3,true),
            'quantity' => fake()->numberBetween(1 , 50),
            'price' => fake()->randomFloat(2,100,2000),
            'status' => fake()->randomElement(EStatus::cases())
        ];
    }
}
