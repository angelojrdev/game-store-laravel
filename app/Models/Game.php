<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    protected function descriptionHtml(): Attribute
    {
        return Attribute::make(
            get: fn() => Str::markdown($this->description, [
                'html_input' => 'escape',
                'allow_unsafe_links' => false,
            ]),
        );
    }
}
