<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Appliance;
use App\Models\Education;
use App\Models\Internship;
use App\Models\Requirement;
use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            EducationLevelSeeder::class,
            UserSeeder::class,
        ]);

        Internship::factory(10)->recycle([
            Company::all()
        ])->create();

        Appliance::factory(5)->recycle([
            User::all(),
            Internship::all()
        ])->create();

        $internships = Internship::all();
        $educations = EducationLevel::all();
        foreach ($internships as $internship) {
            Requirement::create([
                'internship_id' => $internship->id,
                'education_level_id' => $educations->random()->id,
            ]);
        }

        $this->call([
            CommentSeeder::class,
        ]);
    }
}
