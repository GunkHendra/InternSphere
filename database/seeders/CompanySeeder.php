<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'company_name' => 'Google',
            'slug' => 'google',
            'logo' => 'Google_logo.png',
            'focus' => 'Technology',
            'email' => 'google@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Company::create([
            'company_name' => 'Facebook',
            'slug' => 'facebook',
            'logo' => 'Facebook_Logo.png',
            'focus' => 'Technology',
            'email' => 'facebook@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Company::create([
            'company_name' => 'Apple',
            'slug' => 'apple',
            'logo' => 'apple_logo.png',
            'focus' => 'Technology',
            'email' => 'apple@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
