<?php

namespace Database\Seeders;

use App\Models\NewsPost;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'username' => 'angelojr',
            'full_name' => 'Angelo Oliveira Jr.',
            'email' => 'angelojr@eg.email',
            'password' => Hash::make('adminpass'),
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
