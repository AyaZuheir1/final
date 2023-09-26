<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hall>
 */
class HallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'ju',
            'type' => 'workspace',
            'number_of_seats' => 22,
            'days_of_works' => 'Sun to Thu',
            'location' => 'Gaza',
        ];
    }
}
