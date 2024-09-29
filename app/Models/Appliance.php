<?php

namespace App\Models;

use App\Models\User;
use App\Models\Internship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appliance extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id'
    ];

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
