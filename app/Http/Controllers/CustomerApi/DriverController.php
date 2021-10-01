<?php

namespace App\Http\Controllers\CustomerApi;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{

    public function index(VehicleType $vehicleType)
    {
        try {
            $validator = Validator::make(request()->all(), [
                'lat'      => 'required',
                'lng'      => 'required',
                'distance' => 'required',
                'time'     => 'required'
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $vendors = $this->getDriverByDistance(request('lat'), request('lng'), $vehicleType->id);

//            dd($vendors);

            if (count($vendors) > 0) {
                return makeJsonResponse(
                    'Success', [
                        'vendors' => $this->calculateDistanceAndByRange(request('distance'), request('time'), $vehicleType, $vendors)
                    ]
                );
            }
            return makeJsonResponse('Error', [], 422, 'Driver Not Available');


        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('User Not Found');
        }
    }

    protected function getDriverByDistance($user_lat, $user_lng, $id)
    {
        return Vendor::query()
            ->where('status', '=', 1)
            ->with([
                'driver' => fn($query) => $query
                    ->where('status', '1')
                    ->with('vehicle')
                    ->whereHas('vehicle',
                        fn($query) => $query->where('vehicle_type_id', $id)
                    )
            ])
            ->selectRaw("*, (
                      6371 * acos (
                      cos ( radians({$user_lat}) )
                      * cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians({$user_lng}) )
                      + sin ( radians({$user_lat}) )
                      * sin( radians( latitude ) )
                    )
                ) AS distance")
            ->having("distance", '<', 10)
            ->orderBy('distance')
            ->get();
    }

    protected function calculateDistanceAndByRange($distance, $time, VehicleType $vehicleType, $vendors)
    {
        return $vendors->map(function (Vendor $vendor) use ($vehicleType, $distance, $time) {
//            dd($vendor->distance);
//            if (!is_null($vendor->range) && $vendor->range < $vendor->distance) {
//                return null;
//            }
            $vendorBaseFare = $vendor->vendorBaseFare()->whereVehicleTypeId($vehicleType->id)->first();
            if ($vendorBaseFare != null) {
                $charges = $baseFare = $vendorBaseFare->base_fare;

                if ($distance > 10 || $time > 240) {

                    $extraDistanceCharges = 0;
                    if($distance > 10){
                        $extraKm = $distance - 10;
                        $extraDistanceCharges = $vendorBaseFare->per_km * $extraKm;
                    }

                    $extraTimeCharges = 0;
                    if($time > 240){
                        $extraHours = $time/60 - 240/60;
                        $extraTimeCharges = $vendorBaseFare->per_hours * $extraHours;
                    }

                    $charges = $baseFare + $extraDistanceCharges + $extraTimeCharges;
                }

                $vendor = $vendor->toArray();

                $vendor['price_estimation'] = $charges;

                return $vendor;
            }
        })
            ->filter()
            ->values();
    }

}
