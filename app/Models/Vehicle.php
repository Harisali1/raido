<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vehicle_type_id',
        'vendor_id',
        'vehicle_cc',
        'vehicle_no',
        'license_no',
        'make',
        'model',
        'color',
        'year',
        'image',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function driver() {
        return $this->hasOne(Driver::class);
    }

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class,);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }
}
