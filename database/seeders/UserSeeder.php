<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Education;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->recycle([
            Education::all()
        ])->create();
    }
}
