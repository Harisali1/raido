<?php

namespace App\Traits;

use App\Models\Rating;
use App\Models\UserRequest;

trait HasRevenue
{

    public function userRequest()
    {
        return $this->hasMany(UserRequest::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getRevenueAttribute()
    {
        return $this->userRequest->sum('amount');
    }


}
