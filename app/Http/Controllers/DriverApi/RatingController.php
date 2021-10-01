<?php


namespace App\Http\Controllers\DriverApi;


use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\UserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{

    public function index()
    {
        return makeJsonResponse('Driver Rating',
            Rating::where('driver_id', auth()->id())->get());
    }

}
