<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'user_request_id',
        'comment',
        'rating'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function userRequest()
    {
        return $this->belongsTo(UserRequest::class,);
    }
}
