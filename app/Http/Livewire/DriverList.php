<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;

class DriverList extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'driverDeleted' => 'deleteDriver',
        'statusUpdated' => 'updateDriverStatus'
    ];

    public function deleteDriver($id)
    {
        Driver::find($id)->delete();
    }

    public function updateDriverStatus(Driver $driver)
    {
        $driver->update([
            'status' => !$driver->status
        ]);
    }

    protected function filter()
    {
         $driver = Driver::query();

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
        return view('livewire.driver-list')->with(['drivers' => $this->filter()]);
    }
}
