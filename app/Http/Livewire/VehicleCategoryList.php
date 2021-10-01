<?php

namespace App\Http\Livewire;

use App\Models\VehicleCategory;
use Livewire\Component;
use Livewire\WithPagination;

class VehicleCategoryList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'VehicleCategoryDeleted' => 'deleteVehicleCategory',
    ];

    public function deleteVehicleCategory($id)
    {
        VehicleCategory::find($id)->delete();
    }


    protected function filter()
    {
        $vehicleCategory = VehicleCategory::query();

        if ($this->search) {
            $vehicleCategory = $vehicleCategory
                ->where('title', 'like', "%{$this->search}%");
        }
        return $vehicleCategory
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.vehicle-category-list')->with(['vehicleCategories' => $this->filter()]);
    }
}
