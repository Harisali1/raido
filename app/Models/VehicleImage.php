<?php

namespace App\Models;

use App\Traits\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    use HasFactory, FileHelper;

    protected $fillable = [
        'vehicle_id',
        'label',
        'image'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
