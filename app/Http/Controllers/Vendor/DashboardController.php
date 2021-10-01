<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use App\Models\UserRequest;
use App\Models\Vehicle;
use App\Models\Vendor;
use App\Models\VendorCredit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $id = auth('vendor')->user()->id;

        $drivers = Driver::with('userRequest')->whereVendorId($id)->get();

        $todayPendingRides = UserRequest::with('driver','user')
            ->where('status', 'SEARCHING')
            ->whereDate('created_at', Carbon::today())
            ->wherehas('driver', function ($query) use ($id) {
                $query->whereVendorId($id);
            })->get();

        $todayApprovedRides = UserRequest::with('driver','user')
            ->where('status', 'ACCEPTED')
            ->whereDate('created_at', Carbon::today())
            ->wherehas('driver', function ($query) use ($id) {
                $query->whereVendorId($id);
            })->get();

        $todayRejectedRides = UserRequest::with('driver','user')
            ->where('status', 'CANCELED')
            ->whereDate('created_at', Carbon::today())
            ->wherehas('driver', function ($query) use ($id) {
                $query->whereVendorId($id);
            })->get();

        $vehicles = Vehicle::whereVendorId($id)->count();

        $credit = VendorCredit::whereVendorId($id)->get()->sum('credit');

        return view('vendor.dashboard',compact(
            'credit',
            'drivers',
            'vehicles',
            'todayPendingRides',
            'todayApprovedRides',
            'todayRejectedRides'
        ));
    }
}
