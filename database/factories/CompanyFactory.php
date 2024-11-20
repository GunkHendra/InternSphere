<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static ?string $password;

    public function definition(): array
    {

        $companies = [
            'Apple' => 'apple_logo.png',
            'Google' => 'google_logo.png',
            'Facebook' => 'facebook_logo.png',

        ];

        $companyNames = array_keys($companies);
        $companyName = $this->faker->unique()->randomElement($companyNames);
        $logo = $companies[$companyName];

        return [
            'company_name' => $companyName,
            'slug' => Str::slug($companyName),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'logo' => $logo,
        ];
    }
}
