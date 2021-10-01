<?php


namespace App\Http\Controllers\DriverApi;


use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index()
    {
        try {
            return makeJsonResponse('Success', Driver::with('vehicle')->findOrFail(auth()->user()->id));

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('User Not Found');
        }
    }

    public function update(Request $request)
    {
        try {

            $id = auth()->id();
            $user = Driver::findOrFail($id);

            $userData = $request->all();
            $vehicleData = $request->all();

            if ($request->has('password')) {
                $userData['password'] = Hash::make($request->get('password'));
            }

            $userData['name'] = "{$userData['first_name']} {$userData['last_name']}";

            $user->update($userData);
            $user->vehicle->update($vehicleData);

            return makeJsonResponse('Success', $user);

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Some Thing Went Wrong']);
        }
    }

}
