<?php


namespace App\Http\Controllers\Vendor;


use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use App\Models\UserRequest;
use App\Notifications\DriverPushNotification;
use App\Notifications\UserPushNotification;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{

    public function index()
    {
        return view('vendor.user_request.index');
    }

    public function show(UserRequest $userRequest)
    {
        $job = UserRequest::with('driver', 'user', 'vehicleType')->findOrFail($userRequest->id);
        return view('vendor.user_request.show', compact('job'));
    }

    public function approved($id)
    {
        $userRequest = UserRequest::findOrFail($id);
        $driver = Driver::findOrFail($userRequest->driver_id);
        $user =  User::findOrFail($userRequest->user_id);

        $userTitle = 'Hi... ' . $user->name;
        $userMessage = 'Your Ride Has Been Accepted By ' . $driver->name;
        $driverTitle = 'Hi... ' . $driver->name;
        $driverMessage = 'Your Ride Has Been Accepted By ' . $driver->vendor->name;

        $user->notify(new UserPushNotification($user, $userTitle, $userMessage));
        $driver->notify(new DriverPushNotification($driver, $driverTitle, $driverMessage));
        $userRequest->update([
            'status' => 'ACCEPTED'
        ]);
        return redirect()->back();
    }

    public function rejected(Request $request, $id)
    {
        $userRequest = UserRequest::findOrFail($id);

        $userRequest->update([
            'reason' => $request->get('reason'),
            'status' => 'CANCELED'
        ]);

        return redirect()->back();
    }
//
//    public function update(Request $request, UserRequest $job)
//    {
//        $job->update([
//            'driver_id' => $request->get('driver_id')
//        ]);
//    }
//
//    public function export(Request $request)
//    {
//        return Excel::download(new JobExport($request), 'jobs.xlsx');
//
//    }
}
