<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleCategoryRequest;
use App\Http\Requests\VehicleCategoryUpdate;
use App\Models\VehicleCategory;
use App\Traits\CacheHelper;
use App\Traits\FileHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleCategoryController extends Controller
{
    use CacheHelper, FileHelper;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->authorizeForUser(auth()->user(), 'vehicle_category_management');
            } catch (AuthorizationException $e) {
                abort(401);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.vehicle-category.index');
    }

    public function create()
    {
        return view('admin.vehicle-category.create');
    }

    public function store(VehicleCategoryRequest $request)
    {
        $vehicleCategoryData = $request->all();
        $vehicleCategoryData['image'] = $this->saveFileAndGetName($request->file('image'));
        $vehicleCategory = VehicleCategory::create($vehicleCategoryData);
        return $request->wantsJson()
            ? new Response($vehicleCategory->toJson(), 201)
            : redirect()->route('admin.vehicle_category.index');
    }

    public function edit(VehicleCategory $vehicle_category)
    {
        return view('admin.vehicle-category.edit', compact('vehicle_category'));
    }

    public function update(VehicleCategoryUpdate $request, VehicleCategory $vehicle_category)
    {
        $vehicleCategoryData = $request->all();
        if ($request->hasFile('image')) {
            $vehicleCategoryData['image'] = $this->updateFileAndGetName($request->file('image'), $vehicle_category->image);
        }

        $vehicle_category->update($vehicleCategoryData);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('admin.vehicle_category.index');
    }
}
