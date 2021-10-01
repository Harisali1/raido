<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable =[
        'location',
        'city',
        'province_name',
        'locality',
        'latitude',
        'longitude'
    ];

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }

}

