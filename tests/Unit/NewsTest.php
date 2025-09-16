<?php

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('has a valid factory', function () {
    $user = User::factory()->create();
    $news = News::factory()->create(['author_id' => $user->id]);

    expect(News::whereId($news->id)->exists())->toBeTrue();
});

it('fetches the author relationship', function () {
    $user = User::factory()->create();
    $news = News::factory()->create(['author_id' => $user->id]);

    expect($news->author)->toBeInstanceOf(User::class);
});