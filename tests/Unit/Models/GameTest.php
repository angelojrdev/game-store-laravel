<?php

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('has a valid factory', function () {
    $game = Game::factory()->create();

    expect(Game::whereId($game->id)->exists())->toBeTrue();
});

it('renders description to html', function () {
    $game = Game::factory()->create(
        ['description' => "## Test\n\nHello, **World**"],
    );

    expect($game->description_html)->toContain('<h2>Test</h2>', '<strong>World</strong></p>');
});

it('escapes raw html input on description', function () {
    $game = Game::factory()->create([
        'description' => '<script>alert("hacked")</script>',
    ]);

    $html = $game->description_html;

    expect($html)->toContain('&lt;script&gt;alert("hacked")&lt;/script&gt;')
        ->and($html)->not()->toContain('<script>');
});

it('disallows unsafe links on description', function () {
    $game = Game::factory()->create([
        'description' => '[Click me](javascript:alert("XSS"))',
    ]);

    $html = $game->description_html;

    expect($html)->toContain('<a')
        ->and($html)->not()->toContain('javascript:');
});