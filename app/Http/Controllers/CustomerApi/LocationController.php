<?php


namespace App\Http\Controllers\CustomerApi;


use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Rating;
use App\Models\UserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{

    public function index(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'city'     => 'required|unique:locations,city',
                'area'     => 'required',
                'location' => 'required',
                'lat'      => 'required',
                'lng'      => 'required'
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $locationData = $request->all();



            return makeJsonResponse('Success');

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Some Thing Went Wrong']);
        }
    }

}
