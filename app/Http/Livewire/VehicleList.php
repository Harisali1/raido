<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class VehicleList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'vehicleDeleted' => 'deleteVehicle',
    ];

    public function deleteVehicle($id)
    {
        Vehicle::find($id)->delete();
    }


    protected function filter()
    {
        $vehicle = Vehicle::with('vehicle_type','driver');

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
//        dd($this->filter());
        return view('livewire.vehicle-list')->with(['vehicles' => $this->filter()]);
    }
}
