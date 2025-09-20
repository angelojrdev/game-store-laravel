<?php

namespace App\Console\Commands;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

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
        $rules = (new RegisterUserRequest())->rules();

        $form = [
            'username' => $this->ask('Username'),
            'first_name' => $this->ask('First Name'),
            'last_name' => $this->ask('Last Name'),
            'email' => $this->ask('Email Address'),
            'password' => $this->secret('Password'),
            'password_confirmation' => $this->secret('Confirm Password'),
        ];

        $validator = Validator::make($form, $rules);

        if ($validator->fails()) {
            $this->error('Validation failed:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return;
        }

        $user = User::create($form);
        $user->is_admin = true;
        $user->save();

        $this->info("Admin user '{$user->full_name}' created successfully!");
    }
}
