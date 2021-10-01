<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleTypeStore;
use App\Http\Requests\VehicleTypeUpdate;
use App\Models\VehicleCategory;
use App\Models\VehicleType;
use App\Traits\CacheHelper;
use App\Traits\FileHelper;
use Illuminate\Http\Response;

class VehicleTypeController extends Controller
{
    use FileHelper, CacheHelper;

    public function index()
    {
        return view('admin.vehicle-type.index');
    }

    public function create()
    {
        $vehicleCategories = VehicleCategory::all('id','title as text');
        return view('admin.vehicle-type.create', compact('vehicleCategories'));
    }

    public function store(VehicleTypeStore $request)
    {
//        dd($request->all());
        $vehicleTypeData = $request->all();
        $vehicleTypeData['image'] = $this->saveFileAndGetName($request->file('image'));

        $vehicleType = VehicleType::create($vehicleTypeData);

        return $request->wantsJson()
            ? new Response($vehicleType->toJson(), 201)
            : redirect()->route('admin.vehicle_type.index');
    }

    public function edit(VehicleType $vehicleType)
    {
        $vehicleCategories = VehicleCategory::all('*', 'title as text');
        return view('admin.vehicle-type.edit',compact('vehicleType', 'vehicleCategories'));
    }

    public function update(VehicleTypeUpdate $request, VehicleType $vehicleType)
    {

        $vehicleTypeData = $request->all();
        if ($request->hasFile('image')) {
            $vehicleTypeData['image'] = $this->updateFileAndGetName($request->file('image'), $vehicleType->image);
        }

        $vehicleType->update($vehicleTypeData);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('admin.vehicle_type.index');
    }
}
