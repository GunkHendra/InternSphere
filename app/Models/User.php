<?php

namespace App\Models;

use App\Models\Appliance;
use App\Models\EducationLevel;
use App\Models\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [
        'id'
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

    // Relasi ke model Appliance
    public function appliance()
    {
        return $this->hasMany(Appliance::class);
    }

    // Relasi ke model Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
