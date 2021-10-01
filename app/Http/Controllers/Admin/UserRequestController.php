<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\UserRequest;
use App\Traits\CacheHelper;
use Illuminate\Auth\Access\AuthorizationException;

class UserRequestController extends Controller
{
    use CacheHelper;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->authorizeForUser(auth()->user(), 'user_request_management');
            } catch (AuthorizationException $e) {
                abort(401);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.user_request.index');
    }

    public function complete()
    {
        return view('admin.user_request.complete');
    }

    public function canceled()
    {
        return view('admin.user_request.canceled');
    }

    public function pending()
    {
        return view('admin.user_request.pending');
    }

    public function show(UserRequest $userRequest)
    {
        $job = UserRequest::with('driver', 'user', 'vehicleType')->findOrFail($userRequest->id);
        return view('admin.user_request.show', compact('job'));
    }
//
//    public function update(Request $request, UserRequest $job)
//    {
//        $job->update([
//            'driver_id' => $request->get('driver_id')
//        ]);
//    }
//
//    public function export(Request $request)
//    {
//        return Excel::download(new JobExport($request), 'jobs.xlsx');
//
//    }
}
