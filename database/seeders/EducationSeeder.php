<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'education_level' => 'SMA',
            'education_year' => 1
        ]);

        Education::create([
            'education_level' => 'SMA',
            'education_year' => 2
        ]);

        Education::create([
            'education_level' => 'SMA',
            'education_year' => 3
        ]);

        Education::create([
            'education_level' => 'SMK',
            'education_year' => 1
        ]);

        Education::create([
            'education_level' => 'SMK',
            'education_year' => 2
        ]);

        Education::create([
            'education_level' => 'SMK',
            'education_year' => 3
        ]);

        Education::create([
            'education_level' => 'University',
            'education_year' => 1
        ]);

        Education::create([
            'education_level' => 'University',
            'education_year' => 2
        ]);

        Education::create([
            'education_level' => 'University',
            'education_year' => 3
        ]);

        Education::create([
            'education_level' => 'University',
            'education_year' => 4
        ]);
    }
}
