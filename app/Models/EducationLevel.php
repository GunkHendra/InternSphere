<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function requirement()
    {
        return $this->hasMany(Requirement::class, 'education_level_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
