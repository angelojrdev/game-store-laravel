<?php

use App\Models\User;
use App\Services\NewsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(TestCase::class, RefreshDatabase::class);

it('creates a news post as admin user', function () {
    $newsService = new NewsService;
    $user = User::factory()->create(['is_admin' => true]);
    $data = [
        'author_id' => $user->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ];

    $news = $newsService->create($user, $data);

    expect($news)->not()->toBeNull();
});

it('fails to create a news post as invalid user', function () {
    $newsService = new NewsService;
    $user = User::factory()->make();
    $data = [
        'author_id' => $user->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ];

    $newsService->create($user, $data);
})->throws(LogicException::class);

it('fails to create a news post as non admin user', function () {
    $newsService = new NewsService;
    $user = User::factory()->create();
    $data = [
        'author_id' => $user->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ];

    $newsService->create($user, $data);
})->throws(LogicException::class);

it('updates a news post as admin user', function () {
    $newsService = new NewsService;
    $user = User::factory()->create(['is_admin' => true]);
    $news = $newsService->create($user, [
        'author_id' => $user->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ]);

    $newsService->update($user, ['title' => 'New Title'], $news);

    assertDatabaseHas('news', ['title' => 'New Title']);
});

it('fails to update a news post as invalid user', function () {
    $newsService = new NewsService;
    $user = User::factory()->make();
    $news = $newsService->create($user, [
        'author_id' => User::factory()->create()->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ]);

    $newsService->update($user, ['title' => 'New Title'], $news);
})->throws(LogicException::class);

it('fails to update a news post as non admin user', function () {
    $newsService = new NewsService;
    $user = User::factory()->create();
    $news = $newsService->create($user, [
        'author_id' => User::factory()->create(['is_admin' => true])->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ]);

    $newsService->update($user, ['title' => 'New Title'], $news);
})->throws(LogicException::class);

it('deletes a news post', function () {
    $newsService = new NewsService;
    $user = User::factory()->create(['is_admin' => true]);
    $news = $newsService->create($user, [
        'author_id' => $user->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ]);

    $result = $newsService->delete($user, $news);

    assertDatabaseMissing('news', ['title' => $news->title]);
    expect($result)->toBeTrue();
});

it('fails to delete a news post as invalid user', function () {
    $newsService = new NewsService;
    $user = User::factory()->make();
    $news = $newsService->create($user, [
        'author_id' => $user->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ]);

    $newsService->delete($user, $news);
})->throws(LogicException::class);

it('fails to delete a news post as non admin user', function () {
    $newsService = new NewsService;
    $user = User::factory()->create();
    $news = $newsService->create($user, [
        'author_id' => $user->id,
        'title' => 'Test Post',
        'content' => 'Hello, World!',
    ]);

    $newsService->delete($user, $news);
})->throws(LogicException::class);
