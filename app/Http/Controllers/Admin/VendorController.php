<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\VendorChangePassword;
use App\Http\Requests\VendorStoreRequest;
use App\Models\Vendor;
use App\Models\VendorCredit;
use App\Traits\CacheHelper;
use App\Traits\Credit;
use App\Traits\FileHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    use CacheHelper, FileHelper, Credit;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->authorizeForUser(auth()->user(), 'vendor_management');
            } catch (AuthorizationException $e) {
                abort(401);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.vendor.index');
    }

    public function create()
    {
        $vendors = Vendor::all('id', 'referral_code as text');
        return view('admin.vendor.create', compact('vendors'));
    }

    public function store(VendorStoreRequest $request)
    {
        $vendorData = $request->all();
        $slug = Str::slug($vendorData['name'], '-');
        $vendorData['password'] = bcrypt($vendorData['password']);
        $vendorData['admin_id'] = auth()->user()->id;
        $vendorData['referral_code'] = 'Raido-' . $slug;
        $vendorData['image'] = $this->saveFileAndGetName($request->file('image'));

        if ($request->get('vendor_referral_code') != null) {
            $vendor = Vendor::whereReferralCode($request->get('vendor_referral_code'))->first();
            if ($vendor == null) {
                $request->validate([
                    'vendor_referral_code' => 'same:referral_code',
                ], ['same' => 'The :attribute Does Not Match']);
            }
            if ($vendor != null) {
                $vendorData['vendor_referral_code'] = $vendor->id;
            }
        }

        $vendor = Vendor::create($vendorData);

        VendorCredit::create([
            'vendor_id' => $vendor->id,
            'credit'    => $request->get('credit'),
            'reason'    => 'Initial Credit',
        ]);

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect()->route('admin.vendor.index');
    }

    public function edit(Vendor $vendor)
    {
        return view('admin.vendor.edit', compact('vendor'));
    }

    public function show(Vendor $vendor)
    {
        $vendor->load('driver.userRequest', 'vendorCredit');
        $userRequests = $vendor->driver->pluck('userRequest')->flatten()->values();

        return view('admin.vendor.show', compact('vendor', 'userRequests'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $vendorData = $request->all();

        if ($request->get('password') === null) {
            unset($vendorData['password']);
        }

        if ($request->get('password') !== null) {
            $vendorData['password'] = bcrypt($request->get('password'));
        }

        if ($request->hasFile('image')) {
            $vendorData['image'] = $this->updateFileAndGetName($request->file('image'), $vendor->image);
        }

        $vendor->update($vendorData);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('admin.vendor.index');
    }

    public function updatepassword(vendorchangepassword $request, vendor $vendor)
    {
        $vendor->update(['password' => bcrypt($request->get('new_password'))]);
        return redirect()->back()->with('success', 'password change successfully');
    }

    public function addCredit(Request $request, Vendor $vendor)
    {
        $this->credit($request, $vendor);
    }

    public function addPenalty(Request $request, Vendor $vendor)
    {
        $this->penalty($request, $vendor);
    }

    public function addBonus(Request $request, Vendor $vendor)
    {
        $this->bonus($request, $vendor);
    }
}
