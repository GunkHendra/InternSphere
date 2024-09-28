<?php

namespace App\Models;

use App\Models\Education;
use App\Models\Internship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requirement extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function internship() : BelongsTo
    {
        return $this->belongsTo(Internship::class);
    }

    public function education() : BelongsTo
    {
        return $this->belongsTo(Education::class);
    }
}
