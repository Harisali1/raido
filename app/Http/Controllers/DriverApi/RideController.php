<?php

namespace App\Http\Controllers\DriverApi;

use App\Http\Controllers\Controller;
use App\Models\UserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RideController extends Controller
{
    public function index()
    {
        return makeJsonResponse('Ride History Fetch Successful', [
            'upcoming'  => $this->getUpcoming(),
            'canceled'  => $this->getCanceled(),
            'completed' => $this->getCompleted()
        ]);
    }

    public function show($id)
    {
        try {
            return makeJsonResponse('Success',
                UserRequest::with('driver', 'user', 'vehicleType')->findOrFail($id));
        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Detail Not Found');
        }
    }

    protected function getUpcoming()
    {
        return UserRequest::with('driver','vehicleType')
            ->where('driver_id', auth()->id())
            ->whereIn('status', ['SCHEDULED','ACCEPTED'])
            ->get();

    }

    protected function getCanceled()
    {
        return UserRequest::with('user','vehicleType')
            ->where('driver_id', auth()->id())
            ->where('status', 'CANCELED')
            ->get();
    }

    protected function getCompleted()
    {
        return UserRequest::with('driver','vehicleType')
            ->where('driver_id', auth()->id())
            ->where('status', 'COMPLETED')
            ->get();
    }

}
