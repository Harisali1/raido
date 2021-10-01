<?php

namespace App\Models;

use App\Traits\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use HasFactory, Notifiable, FileHelper;

    protected $fillable = [
        'admin_id',
        'name',
        'email',
        'mobile',
        'password',
        'cnic',
        'image',
        'status',
        'latitude',
        'longitude',
        'address',
        'range',
        'device_token',
        'referral_code',
        'vendor_referral_code',
        'reason'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }

    public function vendorBaseFare()
    {
        return $this->hasMany(VendorBaseFare::class);
    }

    public function getEstimatedPriceAttribute()
    {
        return $this->vendorBaseFare->base_fare;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function vendorCredit()
    {
        return $this->hasMany(VendorCredit::class);
    }
}
