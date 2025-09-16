<?php

namespace Database\Seeders;

use App\Models\NewsPost;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'username' => 'admin',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'is_admin' => true,
        ]);

        NewsPost::factory()->count(5)->create([
            'author_id' => $admin->id,
        ]);

        $users = User::factory(10)->create();

        $users->each(function ($user) {
            NewsPost::factory()->create([
                'author_id' => $user->id,
            ]);
        });
    }
}
