<?php

namespace App\Http\Controllers\DriverApi;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'email|required',
                'password'   => 'required',
                'device_token' => 'required',
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $user = Driver::where($request->only('email'))->firstOrFail();
            if (!Hash::check($request->get('password'), $user->password))
                throw new ModelNotFoundException();

            $token = Str::random(100);
            $user->update([
                'api_token' => $token,
                'device_token' => $request->get('device_token'),
                'otp'       => null
            ]);
            return makeJsonResponse('Success', [
                'user'  => $user,
                'token' => $token
            ]);
        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Login Credential Invalid']);
        }
    }
}
