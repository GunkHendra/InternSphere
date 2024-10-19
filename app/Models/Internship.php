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

    // Relasi ke model Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi ke model Appliance
    public function appliance()
    {
        return $this->hasMany(Appliance::class);
    }

    // Relasi ke model Requirement
    public function requirement()
    {
        return $this->hasMany(Requirement::class);
    }

    // Relasi ke model Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Mendapatkan rata-rata rating dari komentar
    public function averageRating()
    {
        return $this->comments()->avg('rating');
    }

    // Mendapatkan jumlah komentar
    public function commentsCount()
    {
        return $this->comments()->count();
    }
}
