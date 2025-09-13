<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

it("allows an authenticated user to logout", function () {
    $this->actingAs($this->user);

    $this->post('/logout')->assertRedirect('/');

    $this->assertGuest();
});

it('clears user session data on logout', function () {
    $this->actingAs($this->user);

    session()->put('item', 100);

    $this->post('/logout')->assertRedirect('/');

    $this->assertGuest();
    $this->assertNull(session('item'));
});