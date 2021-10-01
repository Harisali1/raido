<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;

class VendorDriverList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'vendorDriverDeleted' => 'deleteVendorDriver',
        'statusUpdated' => 'updateVendorDriverStatus'
    ];

    public function deleteVendorDriver($id)
    {
        Driver::find($id)->delete();
    }

    public function updateVendorDriverStatus(Driver $driver)
    {
        $driver->update([
            'status' => !$driver->status
        ]);
    }

    protected function filter()
    {

        $driver = Driver::with('userRequest')->whereVendorId(auth('vendor')->user()->id);

        if ($this->search) {
            $driver = $driver
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('mobile', 'like', "%{$this->search}%");
        }
        return $driver
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

    }

    public function render()
    {
        return view('livewire.vendor.vendor-driver-list')->with(['drivers' => $this->filter()]);
    }

}
