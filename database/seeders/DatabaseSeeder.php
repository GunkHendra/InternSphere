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
        // Panggil seeder lainnya terlebih dahulu
        $this->call([
            CompanySeeder::class,
            EducationLevelSeeder::class,
            UserSeeder::class,
        ]);

        // Buat 10 internships dan kaitkan dengan companies
        Internship::factory(10)->recycle([
            Company::all()
        ])->create();

        // Buat 5 appliances dan kaitkan dengan users dan internships
        Appliance::factory(5)->recycle([
            User::all(),
            Internship::all()
        ])->create();

        // Buat requirements untuk setiap internship
        $internships = Internship::all();
        $educations = EducationLevel::all();
        foreach ($internships as $internship) {
            Requirement::create([
                'internship_id' => $internship->id,
                'education_level_id' => $educations->random()->id,
            ]);
        }

        // Panggil CommentSeeder
        $this->call([
            CommentSeeder::class,
        ]);
    }
}
