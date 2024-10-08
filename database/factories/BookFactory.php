<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->jobTitle();
        return [
            'title' => $title,
            'author' => $this->faker->name(),
            'slug' => Str::slug($title),
            'library_id' => $this->faker->randomDigitNotNull('#'),
            'classification_id' => $this->faker->randomDigitNotNull('#')

        ];
    }
}
