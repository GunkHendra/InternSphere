<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function requirement() : HasMany
    {
        return $this->hasMany(Requirement::class);
    }

    public function user() : HasMany
    {
        return $this->hasMany(User::class);
    }
}
