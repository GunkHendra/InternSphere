<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara mass assignment
    protected $fillable = [
        'rating',
        'comment',
        'internship_id',
        'user_id',
    ];

    /**
     * Relasi ke Internship
     */
    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
