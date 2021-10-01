<?php


namespace App\Http\Controllers\CustomerApi;


use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\UserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{

    public function index(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'driver_id'       => 'required|exists:drivers,id',
                'user_request_id' => 'required|exists:user_requests,id',
                'comment'         => 'required',
                'rating'          => 'required|min:1|max:5',
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error[0]));
            }

            $ratingData = $request->all();

            Rating::create($ratingData);

            return makeJsonResponse('Success');

        } catch (ModelNotFoundException $e) {
            return makeJsonResponse('Error', [], 404, ['Some Thing Went Wrong']);
        }
    }

}
