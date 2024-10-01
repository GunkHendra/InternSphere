<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationLevel::create([
            'education_level' => 'SMA',
            'education_year' => 1
        ]);

        EducationLevel::create([
            'education_level' => 'SMA',
            'education_year' => 2
        ]);

        EducationLevel::create([
            'education_level' => 'SMA',
            'education_year' => 3
        ]);

        EducationLevel::create([
            'education_level' => 'SMK',
            'education_year' => 1
        ]);

        EducationLevel::create([
            'education_level' => 'SMK',
            'education_year' => 2
        ]);

        EducationLevel::create([
            'education_level' => 'SMK',
            'education_year' => 3
        ]);

        EducationLevel::create([
            'education_level' => 'University',
            'education_year' => 1
        ]);

        EducationLevel::create([
            'education_level' => 'University',
            'education_year' => 2
        ]);

        EducationLevel::create([
            'education_level' => 'University',
            'education_year' => 3
        ]);

        EducationLevel::create([
            'education_level' => 'University',
            'education_year' => 4
        ]);

        EducationLevel::create([
            'education_level' => 'University',
            'education_year' => 5
        ]);
    }
}
