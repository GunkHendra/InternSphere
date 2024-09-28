<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appliance>
 */
class ApplianceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'internship_id' => Internship::factory(),
            'status' => 'Waiting for Confirmation'
        ];
    }
}
