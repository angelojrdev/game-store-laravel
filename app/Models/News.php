<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    protected $with = ['author'];

    protected function contentHtml(): Attribute
    {
        return Attribute::make(
            get: fn() => Str::markdown($this->content, [
                'html_input' => 'escape',
                'allow_unsafe_links' => false,
            ]),
        );
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
