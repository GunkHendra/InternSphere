<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Internship>
 */
class InternshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'slug' => Str::slug(fake()->unique()->sentence()),
            // 'excerpt' => fake()->sentence(15),
            // 'description' => '<p>' . implode('<p></p>', fake()->paragraphs(mt_rand(10, 30))) . '</p>',
            'description' => fake()->sentence(150),
            'published_at' => now(),
            'company_id' => Company::factory(),
        ];
    }
}
