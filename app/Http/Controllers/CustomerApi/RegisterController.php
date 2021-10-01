<?php


namespace App\Http\Controllers\CustomerApi;

use App\Http\Controllers\Controller;
use App\Models\User;
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
                'first_name' => 'required',
                'last_name'  => 'required',
                'email'      => 'email|required|unique:users',
                'mobile'     => 'required|unique:users|min:11|max:14',
                'cnic'       => 'required|min:13|max:15',
                'gender'     => 'required',
                'password'   => 'required|min:8',
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

            $user = User::create($userData);

            return makeJsonResponse('Success', [
                'user'  => $user,
                'token' => $token
            ]);

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Some Thing Went Wrong']);
        }
    }


}
