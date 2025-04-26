<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slideshow>
 */
class SlideshowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(1), // or ->sentence(2) if you want a short name
            "image" => $this->faker->randomElement(['slide1.png', 'slide2.jpg', 'slide3.jpg']),
            "enable" => $this->faker->boolean(),
            "ssorder" => $this->faker->numberBetween(1, 100)
        ];
    }
}
