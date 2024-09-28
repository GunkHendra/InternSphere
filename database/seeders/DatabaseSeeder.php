<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Appliance;
use App\Models\Education;
use App\Models\Internship;
use App\Models\Requirement;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\EducationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([CompanySeeder::class, EducationSeeder::class, UserSeeder::class]);
        
        Internship::factory(10)->recycle([
            Company::all()
        ])->create();

        Appliance::factory(5)->recycle([
            User::all(),
            Internship::all()
        ])->create();

        Requirement::factory(10)->recycle([
            Internship::all(),
            Education::all()
        ])->create();
    }
}
