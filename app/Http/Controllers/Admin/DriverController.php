<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverChangePassword;
use App\Http\Requests\DriverStoreRequest;
use App\Http\Requests\DriverUpdateRequest;
use App\Models\Area;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\VehicleType;
use App\Models\Vendor;
use App\Traits\CacheHelper;
use App\Traits\FileHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DriverController extends Controller
{
    use CacheHelper,FileHelper;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->authorizeForUser(auth()->user(), 'driver_management');
            } catch (AuthorizationException $e) {
                abort(401);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.driver.index');
    }

    public function create()
    {

        $areas = Area::all('id', 'locality as text');
        $vehicleTypes = VehicleType::all('id','title as text');
        $vendors = Vendor::all('id','name as text');
        return view('admin.driver.create', compact('vehicleTypes', 'vendors', 'areas'));
    }

    public function store(DriverStoreRequest $request)
    {
        $vehicleData = [
            'name'            => $request->get('vehicle_name'),
            'vendor_id'       => $request->get('vendor_id'),
            'vehicle_type_id' => $request->get('vehicle_type_id'),
            'vehicle_cc'      => $request->get('vehicle_cc'),
            'vehicle_no'      => $request->get('vehicle_no'),
            'license_no'      => $request->get('license_no'),
            'make'            => $request->get('make'),
            'model'           => $request->get('model'),
            'color'           => $request->get('color'),
            'year'            => $request->get('year'),
            'description'     => $request->get('description'),
            'status'          => 1
        ];

        if ($request->file('vehicle_image1')) {
            $vehicleData['image'] = $this->saveFileAndGetName($request->file('vehicle_image1'), Vehicle::class);
        }

        $vehicle = Vehicle::create($vehicleData);

        $images = $request->vehicle_images;
        $vehicleImages = [];
        if($images){
            foreach ($images as $document) {
                $vehicleImages[] = [
                    'label' => 1,
                    'image' => $this->saveFileAndGetName($document, VehicleImage::class)
                ];
            }
            $vehicle->images()->createMany($vehicleImages);
        }

        $driverData = $request->except('vehicle_images', 'image', 'vehicle_image1');

        $driverData['vendor_id'] = $request->get('vendor_id');
        $driverData['password'] = bcrypt($driverData['password']);

        if ($request->file('image')) {
            $driverData['image'] = $this->saveFileAndGetName($request->file('image'), Driver::class);
        }

        $driverData['vehicle_id'] = $vehicle->id;

        Driver::create($driverData);

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('vendor.driver.index');
    }

    public function show(Driver $driver)
    {

        $driver = Driver::query()->with(['vehicle', 'userRequest' => function (HasMany $query) use ($driver) {
            return $query
                ->with('user','vehicleType');
        }
        ])->findOrFail($driver->id);

//        dd($driver);

        return view('admin.driver.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        $areas = Area::all('id', 'locality as text');
        $vehicleTypes = VehicleType::all('id', 'title as text');
        $vehicle = Vehicle::findOrFail($driver->vehicle_id);
        return view('admin.driver.edit', compact('driver', 'vehicle', 'vehicleTypes','areas'));
    }

    public function update(Request $request, Driver $driver)
    {
        $vehicleData = [
            'name'            => $request->get('vehicle_name'),
            'vehicle_type_id' => $request->get('vehicle_type_id'),
            'vehicle_cc'      => $request->get('vehicle_cc'),
            'vehicle_no'      => $request->get('vehicle_no'),
            'license_no'      => $request->get('license_no'),
            'make'            => $request->get('make'),
            'model'           => $request->get('model'),
            'color'           => $request->get('color'),
            'year'            => $request->get('year'),
            'description'     => $request->get('description'),
            'image'           => $request->hasFile('vehicle_image1')
                ? $this->updateFileAndGetName($request->file('vehicle_image1'), $driver->vehicle->image)
                : $driver->vehicle->image,
        ];

        $driver->vehicle->update($vehicleData);

        $driverData = $request->all();

        if($request->get('password') === null){
            unset($driverData['password']);
        }

        if($request->get('password') !== null){
            $driverData['password'] = bcrypt($request->get('password'));
        }

        if ($request->hasFile('image')) {
            $driverData['image'] = $this->updateFileAndGetName($request->file('image'), $driver->image);
        }

        $driver->update($driverData);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('vendor.driver.index');
    }

    public function updatePassword(DriverChangePassword $request, Driver $driver)
    {
        $driver->update(['password'=> bcrypt($request->get('new_password'))]);
        return redirect()->back()->with('success','password change successfully');
    }

}
