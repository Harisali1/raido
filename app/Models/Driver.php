<?php

namespace App\Models;

use App\Traits\HasRevenue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{

    use HasFactory, Notifiable, HasRevenue;

    protected $fillable = [
        'vehicle_id', 'vendor_id', 'area_id', 'name', 'email', 'mobile', 'password', 'dob', 'gender', 'license_no', 'cnic_no', 'image', 'address', 'status',
        'otp', 'api_token', 'device_token', 'platform','current_lat', 'current_lng', 'availability'
    ];

    protected $hidden = [
        'password', 'api_token', 'device_token'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    protected $appends = ['average_rating'];

    public function userRequest()
    {
        return $this->hasMany(UserRequest::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getAverageRatingAttribute()
    {
        return $this->ratings->avg('rating') ?? 0;
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);

    }
}
