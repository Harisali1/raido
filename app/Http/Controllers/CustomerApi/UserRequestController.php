<?php


namespace App\Http\Controllers\CustomerApi;


use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Location;
use App\Models\Driver;
use App\Models\Vendor;
use App\Models\UserRequest;
use App\Notifications\VendorPushNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRequestController extends Controller
{

    public function index(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'booking_id'          => 'required',
                'vehicle_type_id'     => 'required|exists:vehicle_types,id',
                'driver_id'           => 'required|exists:drivers,id',
                'distance'            => 'required',
                'start_address'       => 'required',
                'end_address'         => 'required',
                'reached_time'        => "required",
                'return_time'         => "required",
                'estimated_price'     => 'required',
                'number_of_passenger' => 'required',
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $userRequestData = $request->all();
            $userRequestData['user_id'] = auth()->id();
            $userRequest = UserRequest::create($userRequestData);
            $this->updateBookingId($userRequest);

            // send Notification Code

            $driver = Driver::findOrFail($request->get('driver_id'));
            $vendor = Vendor::findOrFail($driver->vendor_id);

            $title = 'Hi... ' . $driver->vendor->name;
            $message = 'You Have A New Request';

            $vendor->notify(new VendorPushNotification($vendor, $title, $message));

            $city = City::query()->firstOrCreate([
                // 'name' => $userRequestData['city']
                'name' => 'Karachi',
            ]);

            $district = District::query()->firstOrCreate([
                'city_id' => 1,
                'name'    => 'sindh'
            ]);

            Location::query()->firstOrCreate([
                'city_id'     => $city->id,
                'district_id' => $district->id,
                'address'     => $userRequestData['start_address'],
                'lat'         => $userRequestData['start_latitude'],
                'lng'         => $userRequestData['start_longitude'],
            ]);

            return makeJsonResponse('Success', ['id' => $userRequest->id]);

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Some Thing Went Wrong']);
        }
    }

    protected function updateBookingId($userRequest)
    {
        $userRequest->update([
            'booking_id' => '#RAD' . sprintf('%04d', $userRequest->id)
        ]);
    }

    /**
     * @param Request $request
     * @return bool
     */
//    private function isScheduled(Request $request): bool
//    {
//        return $request->get('booking_type') !== 2;
//    }

//    public function update($id)
//    {
//        try {
//            auth()->user()
//                ->userRequest()
//                ->findOrFail($id)
//                ->update([
//                    'status' => 'CANCELED'
//                ]);
//            return makeJsonResponse('Success');
//        } catch (ModelNotFoundException $e) {
//            return makeJsonResponse('Not Found', [], 404);
//        }
//    }


}
