<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appointed_id' =>1,
            'appointed_type' => 'app\Models\User',
            'hall_id' => 1,
            'start_time' => now(),
            'end_time' => now(),
        ];
    }
}
