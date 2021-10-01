<?php


namespace App\Http\Controllers\CustomerApi;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index()
    {
        try {
            return makeJsonResponse('Success', auth()->user());

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('User Not Found');
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'    => 'required',
                'email'   => 'email|required|unique:users,id,' . auth()->id(),
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422,  collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $id = auth()->id();
            $user = User::findOrFail($id);
            $userData = $request->all();

            if ($request->has('password')) {
                $userData['password'] = Hash::make($request->get('password'));
            }

            $user->update($userData);

            return makeJsonResponse('Success', $user);

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Some Thing Went Wrong']);
        }
    }

}
