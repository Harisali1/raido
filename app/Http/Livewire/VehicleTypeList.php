<?php

namespace App\Http\Livewire;

use App\Models\VehicleType;
use Livewire\Component;
use Livewire\WithPagination;

class VehicleTypeList extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'vehicleTypeDeleted' => 'deleteVehicleType',
        'statusUpdated' => 'updateVehicleTypeStatus'
    ];

    public function deleteVehicleType($id)
    {
        VehicleType::find($id)->delete();
    }


    public function updateVehicleTypeStatus(VehicleType $vehicleType)
    {
        $vehicleType->update([
            'status' => !$vehicleType->status
        ]);
    }

    protected function filter()
    {
        $vehicleType = VehicleType::query();

        if ($this->search) {
            $vehicleType = $vehicleType
                ->where('title', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }
        return $vehicleType
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.vehicle-type-list')->with(['vehicleTypes' => $this->filter()]);
    }
}
