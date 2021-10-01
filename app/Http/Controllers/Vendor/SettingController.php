<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorBaseFareRequest;
use App\Models\BaseFareCalculation;
use App\Models\VehicleType;
use App\Models\VendorBaseFare;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{

    public function index()
    {
        return view('vendor.setting.index');
    }

    public function create(VehicleType $vehicleType)
    {
        return view('vendor.setting.create', compact('vehicleType'));
    }

    public function store(VendorBaseFareRequest $request)
    {
        $vendorBaseFare = $request->all();
        $vendorBaseFare['vendor_id'] = auth('vendor')->user()->id;
        $calculation = VendorBaseFare::create($vendorBaseFare);

        $calculation->baseFareCal()->createMany($request->fareCalculation);

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('vendor.base.fare.calculation.index');
    }

    public function edit(VendorBaseFare $vendor_base_fare)
    {
        $baseFareCal = VendorBaseFare::with('baseFareCal')->findOrFail($vendor_base_fare->id);
        return view('vendor.setting.edit',compact('baseFareCal'));
    }

    public function update(Request $request, VendorBaseFare $vendor_base_fare)
    {
        $vendor_base_fare->update($request->except('fareCalculation'));
        BaseFareCalculation::where('vendor_base_fare_id', '=', $vendor_base_fare->id)->delete();
        $vendor_base_fare->baseFareCal()->createMany($request->fareCalculation);

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('vendor.base.fare.calculation.index');
    }
}
