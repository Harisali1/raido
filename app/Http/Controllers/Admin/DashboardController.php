<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use App\Models\UserRequest;
use App\Models\Vehicle;
use App\Models\Vendor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = User::count();
        $drivers = Driver::count();
        if (auth()->user()->id == 1){
            $vendors = Vendor::count();
        }else{
            $vendors = Vendor::whereAdminId(auth()->user()->id)->count();
        }
        $vehicles = Vehicle::count();
        $rides = UserRequest::count();
        $revenue = UserRequest::all()->sum('amount');

        return view('admin.dashboard',compact(
            'customers',
            'drivers',
            'vehicles',
            'rides',
            'revenue',
            'vendors'
        ));
    }
}
