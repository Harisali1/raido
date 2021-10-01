<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Traits\FileHelper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleImageController extends Controller
{
    use FileHelper;

    public function index(Vehicle $vehicle)
    {
        $vehicleImages = $vehicle->images;
        return view('admin.driver.vehicle-image.index', compact('vehicle', 'vehicleImages'));
    }

    public function create()
    {
        return abort(404);
    }


    public function store(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'image' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png|max:5000'
        ]);

        $vehicleImages = [
            'label' => $request->get('label'),
            'image' => $this->saveFileAndGetName(
                $request->file('image'),
                VehicleImage::class
            )
        ];

        $vehicle->images()->create($vehicleImages);

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('admin.driver.vehicle-image.index', $vehicle);
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {
        return abort(404);
    }

    public function update(Request $request, $id)
    {
        return abort(404);
    }

    public function destroy(VehicleImage $vehicleImage)
    {
        try {
            $this->deleteFile($vehicleImage->image);
            $vehicleImage->delete();
            return request()->wantsJson()
                ? new Response('', 201)
                : redirect()->route('admin.driver.vehicle-image.index');
        } catch (Exception $exception) {
            return abort(404);
        }
    }
}
