<?php


namespace App\Http\Controllers\Vendor;


use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword;
use App\Models\Vendor;
use App\Traits\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    use FileHelper;

    public function index()
    {
        $vendor = Vendor::findOrFail(auth('vendor')->user()->id);
        return view('vendor.profile.show', compact('vendor'));
    }

    public function store(Request $request)
    {
        $vendor = Vendor::findOrFail(auth('vendor')->user()->id);

        $vendorData = $request->all();

        if ($request->hasFile('image')) {
            $vendorData['image'] = $this->updateFileAndGetName($request->file('image'), $vendor->image);
        }

        $vendor->update($vendorData);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('vendor.profile.index');
    }

    public function changePassword(ChangePassword $request)
    {
        Vendor::find(auth('vendor')->user()->id)->update(['password'=> bcrypt($request->get('new_password'))]);
        return redirect()->back()->with('success','password change successfully');
    }
}
