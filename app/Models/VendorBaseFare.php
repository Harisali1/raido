<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBaseFare extends Model
{
    use HasFactory;

    protected $fillable =  [
        'vendor_id',
        'vehicle_type_id',
        'base_fare',
        'per_km',
        'per_hours'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function baseFareCal()
    {
        return $this->hasMany(BaseFareCalculation::class);
    }

}
