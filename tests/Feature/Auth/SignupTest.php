<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it("allows a new user to register successfully", function () {
    $formData = [
        'first_name' => 'Bobby',
        'last_name' => 'Fischer',
        'username' => 'bobfis',
        'email' => 'bobfis@email.eg',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ];

    $response = $this->post('/signup', $formData);

    $response->assertSessionDoesntHaveErrors();
    expect(Auth::check())->toBeTrue()
        ->and(Auth::id())->toBe(
            User::whereEmail($formData['email'])
                ->first()
                ->id,
        );
});

it('fails registration when required fields are missing', function () {
    $formData = [
        'first_name' => '',
        'last_name' => '',
        'username' => '',
        'email' => '',
        'password' => '',
    ];

    $response = $this->post('/signup', $formData);

    $response->assertSessionHasErrors(array_keys($formData));
    expect(Auth::check())->toBeFalse()
        ->and(User::count())->toBe(0);
});

it('fails registration with duplicate email', function () {
    $email = 'example@email.eg';
    User::factory()->create(['email' => $email]);
    $formData = [
        'first_name' => '',
        'last_name' => '',
        'username' => '',
        'email' => $email,
        'password' => '',
    ];

    $response = $this->post('/signup', $formData);

    $response->assertSessionHasErrors('email');
    expect(User::whereEmail($email)->count())->toBe(1)
        ->and(Auth::check())->toBeFalse();
});

it("fails registration when password confirmation doesn't match", function () {
    $formData = [
        'first_name' => 'Bobby',
        'last_name' => 'Fischer',
        'username' => 'bobfis',
        'email' => 'bobfis@email.eg',
        'password' => 'password123',
        'password_confirmation' => 'different123',
    ];

    $response = $this->post('/signup', $formData);

    $response->assertSessionHasErrors('password');
    expect(User::whereEmail($formData['email'])->exists())->toBeFalse()
        ->and(Auth::check())->toBeFalse();
});