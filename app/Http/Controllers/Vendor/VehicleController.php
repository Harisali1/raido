<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Traits\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    use FileHelper;

    public function index()
    {
        return view('vendor.vehicle.index');
    }

    public function create()
    {
        $vehicleTypes = VehicleType::all('id','title as text');
        return view('vendor.vehicle.create', compact('vehicleTypes'));
    }

    public function store(Request $request)
    {
        $vehicleData = $request->all();
        $vehicleData['vendor_id'] = auth('vendor')->user()->id;
        $vehicleData['image'] = $this->saveFileAndGetName($request->file('image'));
        Vehicle::create($vehicleData);
        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('vendor.vehicle.index');
    }

    public function edit(Vehicle $vehicle)
    {
        $vehicleTypes = VehicleType::all('id','title as text');
        return view('vendor.vehicle.edit',compact('vehicleTypes', 'vehicle'));
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
            : redirect()->route('vendor.vehicle.index');
    }
}
