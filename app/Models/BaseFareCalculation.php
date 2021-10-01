<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseFareCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_base_fare_id',
        'vehicle_type_id',
        'label',
        'base_fare',
    ];
}
