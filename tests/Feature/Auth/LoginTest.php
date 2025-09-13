<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $password = 'password123';

    $this->user = User::factory()->create(
        ['password' => Hash::make($password)],
    );

    $this->password = $password;
});

it('allows an user to login with correct credentials', function () {
    $response = $this->post('/login', [
        'username' => $this->user->username,
        'password' => $this->password,
    ]);

    $response->assertRedirect('/');
    $this->assertAuthenticatedAs($this->user);
});

it('disallows an user to login with incorrect credentials', function () {
    $response = $this->post('/login', [
        'username' => $this->user->username,
        'password' => 'wrongpassword',
    ]);

    $response->assertSessionHasErrors('username');
    $this->assertGuest();
});