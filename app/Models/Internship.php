<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    // boleh diisi barengan
    protected $fillable = [
        'title',
        'excerpt',
        'description',
    ];
}


