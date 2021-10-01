<?php


namespace App\Http\Controllers\Vendor;


use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeVehicleStore;
use App\Models\SubDriverVehicle;
use App\Traits\FileHelper;
use Illuminate\Http\Response;

class ChangeVehicleController extends Controller
{
    use FileHelper;

    public function store(ChangeVehicleStore $request)
    {
        $changeVehicleData = $request->all();
        $vehicleChange = SubDriverVehicle::create($changeVehicleData);

        return $request->wantsJson()
            ? new Response($vehicleChange->toJson(), 201)
            : redirect()->route('vendor.driver.index');
    }
}
