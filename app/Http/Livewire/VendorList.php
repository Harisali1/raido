<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class VendorList extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'vendorDeleted' => 'deleteVendor',
        'statusUpdated' => 'updateVendorStatus'
    ];

    public function deleteVendor($id)
    {
        Vendor::find($id)->delete();
    }

    public function updateVendorStatus(Vendor $vendor)
    {
        $vendor->update([
            'status' => !$vendor->status
        ]);
    }

    protected function filter()
    {
        if(auth('admin')->user()->id ==1){
            $vendor = Vendor::query();
        }else{
            $vendor = Vendor::whereAdminId(auth('admin')->user()->id);
        }


        if ($this->search) {
            $vendor = $vendor
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('cnic', 'like', "%{$this->search}%")
                ->orWhere('mobile', 'like', "%{$this->search}%");
        }
        return $vendor
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.vendor-list')->with(['vendors' => $this->filter()]);
    }
}
