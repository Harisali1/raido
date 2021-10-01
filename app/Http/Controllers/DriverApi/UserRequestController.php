<?php


namespace App\Http\Controllers\DriverApi;


use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\UserRequest;
use App\Models\Vendor;
use App\Models\VendorBaseFare;
use App\Notifications\VendorPushNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class UserRequestController extends Controller
{
    public function index()
    {
        try {
            $driver = Driver::findOrFail(auth()->id());
            if ($driver->availability == 'ONLINE') {
                return makeJsonResponse('Request Searching',
                    UserRequest::with('user', 'vehicleType')
                        ->where('driver_id', auth()->id())
                        ->whereDate('created_at', Carbon::today())
                        ->where('status', 'ACCEPTED')
                        ->get());
            }
            return makeJsonResponse('error', [], 400, 'No Request');
        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('No Request');
        }

    }

    public function accept($id)
    {
        $driver = Driver::findOrFail(auth()->id());
        if ($driver->availability == 'ONLINE') {
            $userRequest = UserRequest::findOrFail($id);

            $userRequest->update([
                'status' => 'ACCEPTED'
            ]);
            return makeJsonResponse('Success', ['status' => $userRequest->status]);
        }
        return makeJsonResponse('error', [], 400, 'Driver OFFLINE');
    }

    public function reject($id)
    {
        $driver = Driver::findOrFail(auth()->id());
        if ($driver->availability == 'ONLINE') {
            $userRequest = UserRequest::findOrFail($id);

            $userRequest->update([
                'status' => 'CANCELED'
            ]);
            return makeJsonResponse('Success', ['status' => $userRequest->status]);
        }
        return makeJsonResponse('error', [], 400, 'Driver OFFLINE');
    }

    public function start($id)
    {
        $driver = Driver::whereNotNull('device_token')->findOrFail(auth()->id());
        if ($driver->availability == 'ONLINE') {
            $userRequest = UserRequest::findOrFail($id);
            $vendor = Vendor::findOrFail($driver->vendor_id);

            $userRequest->update([
                'status' => 'STARTED'
            ]);

            $title = 'Driver ' . $driver->name;
            $message = 'Start the ride';

            $vendor->notify(new VendorPushNotification($vendor, $title, $message));

            return makeJsonResponse('Success', ['status' => $userRequest->status]);
        }
        return makeJsonResponse('error', [], 400, 'Driver OFFLINE');
    }

    public function complete($id)
    {

        try {
            $validator = Validator::make(request()->all(), [
                'vehicle_type_id' => 'required',
                'vendor_id'       => 'required',
                'total_km'        => 'required',
                'total_time'      => 'required',
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $driver = Driver::findOrFail(auth()->id());
            $vendor = Vendor::findOrFail($driver->vendor_id);
            if ($driver->availability == 'ONLINE') {
                $price = $this->calculateFinalPrice();
                if($price == null){
                    $price = 0;
                }
                $userRequest = UserRequest::findOrFail($id);

                $userRequest->update([
                    'status' => 'COMPLETED',
                    'amount' => $price
                ]);
            }

            $title = 'Driver ' . $driver->name;
            $message = 'Complete the ride';

            $vendor->notify(new VendorPushNotification($vendor, $title, $message));

            $this->deductTenPercentCredit($price);

            return makeJsonResponse('Success', [
                'status'      => $userRequest->status,
                'final_price' => $price
            ]);
        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('error', [], 400, 'Driver OFFLINE');
        }

    }

    private function calculateFinalPrice()
    {
        try{
            $vendorBasesFare = VendorBaseFare::whereVehicleTypeId(request('vehicle_type_id'))->whereVendorId(request('vendor_id'))->get();
            $totalKm = request('total_km');
            $totalTime = request('total_time');

            if(count($vendorBasesFare) > 0){
                $final = $baseFare = $vendorBasesFare[0]['base_fare'];
                if($totalKm > 10 || $totalTime > 240){

                    $extraKmCharges = 0;
                    if($totalKm > 10){
                        $extraKm = $totalKm - 10;
                        $extraKmCharges = $vendorBasesFare[0]['per_km'] * $extraKm;
                    }

                    $extraTimeCharges = 0;
                    if($totalTime > 240){
                        $extraHours = $totalTime/60 - 240/60;
                        $extraTimeCharges = $vendorBasesFare[0]['per_hours'] * $extraHours;
                    }

                    $final = $baseFare + $extraKmCharges + $extraTimeCharges;

                }
                return $final;
            }
        }catch (ModelNotFoundException $e){
            return makeJsonResponse('error', [], 400, 'Some Thing Went Wrong');
        }
    }

    private function deductTenPercentCredit($price)
    {
        $credit = $price*10/100;
        $vendor = Vendor::findOrfail(request('vendor_id'));
        $updateCredit = $vendor->credit - $credit;
        $vendor->update([
            'credit' => $updateCredit
        ]);
    }
}
