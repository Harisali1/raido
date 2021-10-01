<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerChangePassword;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\User;
use App\Traits\CacheHelper;
use App\Traits\FileHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    use CacheHelper, FileHelper;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->authorizeForUser(auth()->user(), 'customer_management');
            } catch (AuthorizationException $e) {
                abort(401);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.customer.index');
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(CustomerStoreRequest $request)
    {
        $customerData = $request->all();
        $customerData['password'] = bcrypt($customerData['password']);
        $customerData['image'] = $this->saveFileAndGetName($request->file('image'));
        $customerData['status'] = 1;
        $customerData['device_token'] = 'ddrqZO8nZBwsvp2Q8SugKV:APA91bHtnaDkV8bAZS2KvSl5_mR6kPgIw_B5ZhnNEhcG3GFNKd350p6S93YA9tfP3vDsknDYfJiP5fyzr3q_oGWqGXiJatGhg9xPJt430URW-K7h5ExVkStCxZgTe5fU95PVcXraBDz9';
        $user = User::create($customerData);
        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('admin.customer.index');
    }

    public function show(User $customer)
    {
        $customer = User::query()->with(['userRequest' => function (HasMany $query) use ($customer) {
            return $query
                ->with('driver','vehicleType');
            }
        ])->findOrFail($customer->id);
        return view('admin.customer.show',compact('customer'));
    }

    public function edit(User $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, User $customer)
    {
        $customerData = $request->all();

        if($request->get('password') === null){
            unset($customerData['password']);
        }

        if($request->get('password') !== null){
            $customerData['password'] = bcrypt($request->get('password'));
        }

        if ($request->hasFile('image')) {
            $customerData['image'] = $this->updateFileAndGetName($request->file('image'), $customer->image);
        }

        $customer->update($customerData);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('admin.customer.index');
    }

    public function updatePassword(CustomerChangePassword $request, User $customer)
    {
        $customer->update(['password'=> bcrypt($request->get('new_password'))]);
        return redirect()->back()->with('success','password change successfully');
    }
}
