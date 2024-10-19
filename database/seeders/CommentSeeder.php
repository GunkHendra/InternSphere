<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Internship;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan ada data di tabel users dan internships
        $users = User::all();
        $internships = Internship::all();

        if ($users->isEmpty() || $internships->isEmpty()) {
            $this->command->info('No users or internships found. Skipping CommentSeeder.');
            return;
        }

        // Buat 50 komentar dummy
        Comment::factory()->count(50)->make()->each(function ($comment) use ($users, $internships) {
            $comment->user_id = $users->random()->id;
            $comment->internship_id = $internships->random()->id;
            $comment->save();
        });
    }
}
