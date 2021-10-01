<?php


namespace App\Http\Controllers\Vendor;


use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleTypeStore;
use App\Models\VehicleType;
use App\Traits\FileHelper;
use Illuminate\Http\Response;

class VehicleTypeController extends Controller
{
    use FileHelper;

    public function store(VehicleTypeStore $request)
    {
        $vehicleTypeData = $request->all();
        $vehicleTypeData['image'] = $this->saveFileAndGetName($request->file('image'));

        $vehicleType = VehicleType::create($vehicleTypeData);

        return $request->wantsJson()
            ? new Response($vehicleType->toJson(), 201)
            : redirect()->route('vendor.driver.index');
    }
}
