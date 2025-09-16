<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows an authenticated user to logout', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->post('/logout');

    $response->assertSessionDoesntHaveErrors();
    $response->assertRedirect('/');
    expect(Auth::guest())->toBeTrue();
});

it('clears user session data on logout', function () {
    $this->actingAs(User::factory()->create());
    session()->put('session_data', true);

    $response = $this->post('/logout');

    $response->assertSessionDoesntHaveErrors();
    expect(Auth::guest())->toBeTrue()
        ->and(session('session_data'))->toBeNull();
});
