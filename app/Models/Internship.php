<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Appliance;
use App\Models\Requirement;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internship extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function appliance()
    {
        return $this->hasMany(Appliance::class);
    }

    public function requirement()
    {
        return $this->hasMany(Requirement::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function averageRating()
    {
        return $this->comments()->avg('rating');
    }

    public function commentsCount()
    {
        return $this->comments()->count();
    }
}
