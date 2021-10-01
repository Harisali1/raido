<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminChangePassword;
use App\Http\Requests\SubAdminStoreRequest;
use App\Http\Requests\SubAdminUpdateRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Traits\CacheHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubAdminController extends Controller
{
    use CacheHelper;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->authorizeForUser(auth()->user(), 'admin_management');
            } catch (AuthorizationException $e) {
                abort(401);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.sub-admin.index');
    }

    public function create()
    {
        $roles = Role::all('id', 'label as text');
        return view('admin.sub-admin.create', compact('roles'));
    }

    public function store(SubAdminStoreRequest $request)
    {
        $subAdminData = $request->except('role_id');
        $subAdminData['password'] = bcrypt($subAdminData['password']);
        $subAdminData['suspended'] = 0;
        $admin = Admin::create($subAdminData);

        $admin->roles()->sync($request->get('role_id'));
        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('admin.sub_admin.index');
    }

    public function edit(Admin $subAdmin)
    {

        $roles = Role::all('id', 'label as text');
        $subAdmin = Admin::with('roles')->findOrFail($subAdmin->id);
        return view('admin.sub-admin.edit', compact('subAdmin', 'roles'));
    }

    public function show(Admin $subAdmin)
    {
       return view('admin.sub-admin.show',compact('subAdmin'));
    }

    public function update(Request $request, Admin $subAdmin)
    {
        $subAdminData = $request->all();

        if($request->get('password') === null){
            unset($subAdminData['password']);
        }

        if($request->get('password') !== null){
            $subAdminData['password'] = bcrypt($request->get('password'));
        }

        $admin = tap(Admin::find($subAdmin->id))->update($subAdminData);

        $admin->roles()->sync($request->get('role_id'));

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('admin.sub_admin.index');
    }


    public function updatepassword(AdminChangePassword $request, Admin $subAdmin)
    {
        $subAdmin->update(['password' => bcrypt($request->get('new_password'))]);
        return redirect()->back()->with('success', 'password change successfully');
    }

}
