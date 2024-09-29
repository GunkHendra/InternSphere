<?php

namespace App\Models;

use App\Models\Education;
use App\Models\Internship;
use App\Models\EducationLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requirement extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }

    public function education()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id', 'id');
    }
}
