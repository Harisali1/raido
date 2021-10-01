<?php


namespace App\Http\Controllers\CustomerApi;


use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehicleTypeController extends Controller
{
    public function index()
    {
        try {
            return makeJsonResponse('Success', VehicleType::whereStatus(true)->get());
        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Vehicle Types  Not Found');
        }
    }
}
