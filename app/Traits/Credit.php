<?php

namespace App\Traits;

use App\Models\Vendor;
use App\Models\VendorCredit;

trait Credit
{

    public function credit($request, $vendor)
    {
        if($vendor->vendor_referral_code !== null){
            $tenPercentValue = $request->get('credit')*10/100;

            VendorCredit::create([
                'vendor_id' => $vendor->vendor_referral_code,
                'credit' => $tenPercentValue,
                'reason'    => 'Rewarded Amount'
            ]);

            $vendor->update([
                'vendor_referral_code' => null
            ]);
        }

        VendorCredit::create([
            'vendor_id' => $vendor->id,
            'credit' => $request->get('credit'),
            'reason' => 'Recharge Amount'
        ]);

    }

    public function penalty($request, $vendor)
    {
        VendorCredit::create([
            'vendor_id' => $vendor->id,
            'credit'    => -$request->get('credit'),
            'reason' => $request->get('reason'),
        ]);
    }

    public function bonus($request, $vendor)
    {
        VendorCredit::create([
            'vendor_id' => $vendor->id,
            'credit'    => $request->get('credit'),
            'reason' => $request->get('reason'),
        ]);
    }
}
