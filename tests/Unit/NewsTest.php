<?php

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('has a valid factory', function () {
    $news = News::factory()->create([
        'author_id' => User::factory()->create()->id,
    ]);

    expect(News::whereId($news->id)->exists())->toBeTrue();
});

it('has a relationship with "User" (author)', function () {
    $news = News::factory()->create([
        'author_id' => User::factory()->create()->id,
    ]);

    expect($news->author)->toBeInstanceOf(User::class);
});

it('renders content to html', function () {
    $news = News::factory()->create([
        'author_id' => User::factory()->create()->id,
        'content' => "## Test\n\nHello, **World**",
    ]);

    expect($news->content_html)->toContain('<h2>Test</h2>', '<strong>World</strong></p>');
});

it('escapes raw html input on content', function () {
    $news = News::factory()->create([
        'author_id' => User::factory()->create()->id,
        'content' => '<script>alert("hacked")</script>',
    ]);

    $html = $news->content_html;

    expect($html)->toContain('&lt;script&gt;alert("hacked")&lt;/script&gt;')
        ->and($html)->not()->toContain('<script>');
});

it('disallows unsafe links on content', function () {
    $news = News::factory()->create([
        'author_id' => User::factory()->create()->id,
        'content' => '[Click me](javascript:alert("XSS"))',
    ]);

    $html = $news->content_html;

    expect($html)->toContain('<a')
        ->and($html)->not()->toContain('javascript:');
});