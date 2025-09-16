<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:new-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $form = [
            'username' => $this->ask('Username'),
            'first_name' => $this->ask('First Name'),
            'last_name' => $this->ask('Last Name'),
            'email' => $this->ask('Email Address'),
            'password' => $this->secret('Password'),
            'is_admin' => true,
        ];

        if ($form['password'] !== $this->secret('Confirm Password')) {
            $this->fail('Passwords do not match!');
        }

        $user = User::create($form);
        $user->is_admin = true;
        $user->save();

        $this->info("Admin user '{$user->full_name}' created successfully!");
    }
}
