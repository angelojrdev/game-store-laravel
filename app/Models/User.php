<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function createAdmin(array $data): self
    {
        $user = new static($data);
        $user->is_admin = true;
        $user->save();

        return $user;
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "{$attributes['first_name']} {$attributes['last_name']}",
        );
    }

    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::of($value)->trim()->title()->toString(),
        );
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::of($value)->trim()->title()->toString(),
        );
    }

    protected function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => (bool) $attributes['is_admin'],
        );
    }

    public function news()
    {
        return $this->hasMany(News::class, 'author_id');
    }
}
