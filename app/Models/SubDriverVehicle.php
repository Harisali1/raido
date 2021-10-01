<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDriverVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_request_id',
        'driver_name',
        'driver_mobile',
        'vehicle_no'
    ];
}
