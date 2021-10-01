<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleType;
use App\Traits\CacheHelper;
use App\Traits\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    use FileHelper, CacheHelper;

    public function index()
    {
        return view('admin.vehicle.index');
    }

    public function create()
    {
        $vehicleTypes = VehicleType::all('id','title as text');
        return view('admin.vehicle.create', compact('vehicleTypes'));
    }

    public function store(Request $request)
    {
        $vehicleData = $request->all();
        $vehicleData['image'] = $this->saveFileAndGetName($request->file('image'));
        Vehicle::create($vehicleData);
        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('admin.vehicle.index');
    }

    public function edit(Vehicle $vehicle)
    {
        $vehicleTypes = VehicleType::all('id','title as text');
        return view('admin.vehicle.edit',compact('vehicleTypes', 'vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {

        $vehicleData = $request->all();

        if ($request->hasFile('image')) {
            $vehicleData['image'] = $this->updateFileAndGetName($request->file('image'), $vehicle->image);
        }

        $vehicle->update($vehicleData);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('admin.vehicle.index');
    }
}
