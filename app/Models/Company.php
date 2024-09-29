<?php

namespace App\Models;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function internship()
    {
        return $this->hasMany(Internship::class);
    }
}
