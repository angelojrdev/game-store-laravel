<?php

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(TestCase::class, RefreshDatabase::class);

it('registers a user', function () {
    $userService = new UserService();
    $data = [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'username' => 'johndoe',
        'email' => 'john.doe@email.example',
        'password' => 'password',
    ];

    $user = $userService->register($data);

    expect($user)->not()->toBeNull();
    expect($user->email)->toBe($data['email']);
});

it('updates a user', function () {
    $userService = new UserService();
    $user = $userService->register([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'username' => 'johndoe',
        'email' => 'john.doe@email.example',
        'password' => 'password',
    ]);

    $userService->update(['first_name' => 'Bob'], $user);

    assertDatabaseHas('users', ['first_name' => 'Bob']);
});

it('deletes a user', function () {
    $userService = new UserService();
    $user = $userService->register([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'username' => 'johndoe',
        'email' => 'john.doe@email.example',
        'password' => 'password',
    ]);

    $result = $userService->delete($user);

    assertDatabaseMissing('users', ['email' => $user->email]);
    expect($result)->toBeTrue();
});