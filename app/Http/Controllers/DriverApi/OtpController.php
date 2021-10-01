<?php


namespace App\Http\Controllers\DriverApi;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtpController extends Controller
{
    public function index(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'mobile' => 'required|min:11|max:14',
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $user = Driver::where($request->only('mobile'))->firstOrFail();
            $user->update([
                'otp' => 1234
            ]);
            return makeJsonResponse('Success',[
                'otp' => 1234
            ]);
        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Number Not Found']);
        }
    }
}
