<?php

namespace App\Http\Livewire\Vendor;

use App\Models\VehicleType;
use App\Models\VendorBaseFare;
use Livewire\Component;
use Livewire\WithPagination;

class VendorBaseFareList extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'baseFareDeleted' => 'deleteBaseFare',
    ];

    public function deleteBaseFare($id)
    {
        VendorBaseFare::find($id)->delete();
    }

    protected function filter()
    {

        $vendorBaseFare = VehicleType::with('vendorBaseFare');

        if ($this->search) {
            $vendorBaseFare = $vendorBaseFare
                ->where('title', 'like', "%{$this->search}%");
        }
        return $vendorBaseFare
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

    }

    public function render()
    {
        return view('livewire.vendor.vendor-base-fare-list')->with(['baseFares' => $this->filter()]);
    }
}
