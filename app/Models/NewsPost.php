<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    /** @use HasFactory<\Database\Factories\NewsPostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
