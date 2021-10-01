<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class VendorVehicleList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'vendorVehicleDeleted' => 'deleteVendorVehicle',
    ];

    public function deleteVendorVehicle($id)
    {
        Vehicle::find($id)->delete();
    }


    protected function filter()
    {
        $vehicle = Vehicle::with('vehicle_type','driver')->whereVendorId(auth('vendor')->user()->id);

        if ($this->search) {
            $vehicle = $vehicle
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }
        return $vehicle
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.vendor.vendor-vehicle-list')->with(['vehicles' => $this->filter()]);
    }
}
