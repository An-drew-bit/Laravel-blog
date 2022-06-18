<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'author' => $this->faker->name,
            'title' => ucfirst($this->faker->words(4, true)),
            'desc' => $this->faker->text,
            'content' => $this->faker->text,
            'category_id' => rand(1, 10),
            'thumbnail' => 'https://via.placeholder.com/800x900',
            'thumbnail_400' => 'https://via.placeholder.com/800x900',
            'thumbnail_small' => 'https://via.placeholder.com/150x150',
        ];
    }
}
