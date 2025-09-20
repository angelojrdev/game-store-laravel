<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function register(array $data): User
    {
        return User::create($data);
    }

    public function registerAdmin(array $data): User
    {
        return User::createAdmin($data);
    }

    public function update(array $data, User $user): bool
    {
        return $user->update($data);
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
