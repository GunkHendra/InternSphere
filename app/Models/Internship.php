<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Appliance;
use App\Models\Requirement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internship extends Model
{
    use HasFactory;

    // boleh diisi barengan
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'description',
    // ];

    // yang ga boleh diisi (sisanya berarti boleh)
    protected $guarded = [
        'id'
    ];

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function appliance() : HasMany
    {
        return $this->hasMany(Appliance::class);
    }

    public function requirement_detail() : HasMany
    {
        return $this->hasMany(Requirement::class);
    }
}


