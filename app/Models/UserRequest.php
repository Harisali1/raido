<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'driver_id',
        'vehicle_type_id',
        'status',
        'canceled',
        'payment_mode',
        'amount',
        'paid',
        'distance',
        'travel_time',
        'start_address',
        'start_latitude',
        'start_longitude',
        'end_address',
        'end_latitude',
        'end_longitude',
        'track_distance',
        'track_latitude',
        'track_longitude',
        'track_accuracy',
        'penalty',
        'reason',
        'start_at',
        'finished_at',
        'route_key',
        'booking_date',
        'reached_time',
        'return_time',
        'estimated_price',
        'number_of_passenger'
    ];

    protected $dates = ['started_at', 'finished_at'];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function subDriverVehicle()
    {
        return $this->belongsTo(SubDriverVehicle::class);
    }


}
