<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function company(){
        return $this->belongsTo(Company::class);
    }
}


