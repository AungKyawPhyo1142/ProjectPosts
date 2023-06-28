<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city = ['yangon','mandalay','bago','pyay'];

        return [
            'title' => $this->faker->text(10),
            'description' => $this->faker->sentence(50),
            'price' => rand(2000,200000),
            'city' => $city[array_rand($city)],
            'rating' => rand(1,5)
        ];
    }
}
