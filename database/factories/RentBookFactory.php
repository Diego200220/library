<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RentBook>
 */
class RentBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket'=>$this->faker->numerify('Ticket###'),
            'client_id' => $this->faker->randomDigitNotNull('#'),
            'book_id' => $this->faker->randomDigitNotNull('#')
        ];
    }
}
