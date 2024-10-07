<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'author' => $this->faker->name(),
            'slug' => $this->faker->slug(4),
            'library_id' => $this->faker->randomDigitNotNull('#'),
            'classification_id' => $this->faker->randomDigitNotNull('#')

        ];
    }
}
