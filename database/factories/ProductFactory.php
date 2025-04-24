<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            "pname" => $this->faker->word(), // or ->sentence(2) if you want a short name
            "pdesc" => $this->faker->sentence(10), // longer for description
            "price" => $this->faker->randomFloat(2, 1, 9999), // 2 decimal places, range 1 - 9999
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
            "enable" => $this->faker->boolean(),
            "porder" => $this->faker->numberBetween(1, 100)
        ];
    }
}
