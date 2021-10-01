<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_category_id',
        'title',
        'passenger_capacity',
        'sort_order',
        'base_fare',
        'base_waiting_time',
        'waiting_time_penalty',
        'image',
        'description',
        'reason',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];


    public function baseFareCal()
    {
        return $this->hasMany(BaseFareCalculation::class);
    }

    public function vendorBaseFare()
    {
        return $this->hasMany(VendorBaseFare::class);
    }
}
