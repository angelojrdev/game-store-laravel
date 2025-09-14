<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows an user to login with correct credentials', function () {
    $password = "password123";
    $user = User::factory()->create(['password' => $password]);

    $response = $this->post('/login', [
        'username' => $user->username,
        'password' => $password,
    ]);

    $response->assertSessionDoesntHaveErrors();
    expect(Auth::id())->toBe($user->id);
});

it('disallows an user to login with incorrect credentials', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'username' => $user->username,
        'password' => 'wrongpassword',
    ]);

    $response->assertSessionHasErrors('username');
    $this->assertGuest();
});