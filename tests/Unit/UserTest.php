<?php

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('has a valid factory', function () {
    $user = User::factory()->create();

    expect(User::whereId($user->id)->exists())->toBeTrue();
});

it('generates full_name successfully from first_name and last_name', function () {
    $user = new User([
        'first_name' => 'John',
        'last_name' => 'Doe',
    ]);

    expect($user->full_name)->toBe('John Doe');
});

it('correctly formats first_name and last_name on attribution', function () {
    $user = new User([
        'first_name' => ' JOhN ',
        'last_name' => ' dOe JR. ',
    ]);

    expect($user->first_name)->toBe('John')
        ->and($user->last_name)->toBe('Doe Jr.');
});

it('hashes password automatically through casting', function () {
    $user = new User([
        'password' => 'secret123',
    ]);

    expect(Hash::check('secret123', $user->password))->toBe(true);
});

it('has a hasMany relationship with news', function () {
    $user = User::factory()->create();
    News::factory()->count(3)->create([
        'author_id' => $user->id,
    ]);

    expect($user->newsPosts->count())->toBe(3);
});