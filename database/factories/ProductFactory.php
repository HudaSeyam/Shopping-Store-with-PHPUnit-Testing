<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'brand' => fake()->word(),
            'details' =>fake()->sentence(4),
            'description' =>fake()->sentence(4),
            'price' =>fake()->numberBetween(100, 1000),
            'shipping_cost' =>fake()->numberBetween(100, 1000),
            'stock' =>fake()->numberBetween(1, 50),
            'image_path' =>fake()->imageUrl(),
        ];
    }
}
