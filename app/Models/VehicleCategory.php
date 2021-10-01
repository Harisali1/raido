<?php

namespace App\Models;

use App\Traits\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    use HasFactory, FileHelper;

    protected $fillable = [
        'title',
        'app_label',
        'image'
    ];

    public function vehicleType()
    {
        return $this->hasMany(VehicleType::class);
    }
}
