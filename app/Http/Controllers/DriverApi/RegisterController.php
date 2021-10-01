<?php


namespace App\Http\Controllers\DriverApi;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use App\Traits\FileHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use FileHelper;

    public function index(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name'      => 'required',
                'last_name'       => 'required',
                'email'           => 'email|required|unique:drivers',
                'mobile'          => 'required|unique:drivers|min:11|max:14',
                'cnic_no'         => 'required|min:13|max:15',
                'gender'          => 'required',
                'image'           => 'required|mimes:pdf,jpg,jpeg,png|max:5000',
                'password'        => 'required|min:8',
                'vehicle_type_id' => 'required|exists:vehicle_types,id',
                'name'            => 'required',
                'vehicle_cc'      => 'required|unique:vehicles',
                'vehicle_no'      => 'required|unique:vehicles',
                'license_no'      => 'required|unique:vehicles',
                'make'            => 'required',
                'model'           => 'required',
                'color'           => 'required',
                'year'            => 'required|digits:4|integer|min:1990|max:' . (date('Y')),
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $userData = $request->all();
            $userData['name'] = "{$userData['first_name']} {$userData['last_name']}";
            $userData['api_token'] = $token = Str::random(100);
            $userData['status'] = 1;

            if ($request->has('password')) {
                $userData['password'] = Hash::make($request->get('password'));
            }

            if ($request->file('image')) {
                $userData['image'] = $this->saveFileAndGetName($request->file('image'), User::class);
            }

            $vehicleData = [
                'name'            => $request->get('name'),
                'vehicle_cc'      => $request->get('vehicle_cc'),
                'vehicle_no'      => $request->get('vehicle_no'),
                'license_no'      => $request->get('license_no'),
                'vehicle_type_id' => $request->get('vehicle_type_id'),
                'make'            => $request->get('make'),
                'model'           => $request->get('model'),
                'year'            => $request->get('year'),
                'color'           => $request->get('color'),
                'status'          => 1
            ];

            $vehicle = Vehicle::create($vehicleData);

            $userData['vehicle_id'] = $vehicle->id;

            $user = Driver::create($userData);

            return makeJsonResponse('Success', [
                'driver' => $user,
                'token'  => $token
            ]);

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Some Thing Went Wrong']);
        }
    }


}
