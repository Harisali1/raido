<?php

namespace App\Http\Livewire\Vendor;

use App\Models\UserRequest;
use Livewire\Component;
use Livewire\WithPagination;

//use Livewire\WithPagination;

class VendorUserRequestList extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'userRequestDeleted' => 'deleteUserRequest',
    ];

    public function deleteUserRequest($id)
    {
        UserRequest::find($id)->delete();
    }

    public function sortStatus($status)
    {
        $this->search = $status;
    }

    protected function filter()
    {

        $id = auth('vendor')->user()->id;

        $userRequest = UserRequest::with('vehicleType', 'driver', 'user')
            ->wherehas('driver', function ($query) use ($id) {
                $query->whereVendorId($id);
            });

        if ($this->search) {
            $userRequest = $userRequest
                ->where('status', 'like', "%{$this->search}%");
//                ->where('booking_id', 'like', "%{$this->search}%")
//                ->where('start_address', 'like', "%{$this->search}%")
//                ->where('amount', 'like', "%{$this->search}%")
//                ->wherehas('driver', function ($query) {
//                    $query->where('name', 'like', "%{$this->search}%");
//                })
//                ->whereHas('user', function ($query) {
//                    $query->where('name', 'like', "%{$this->search}%");
//                })
//                ->whereHas('vehicleType', function ($query) {
//                    $query->where('title', 'like', "%{$this->search}%");
//                });
        }
        return $userRequest
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.vendor.vendor-user-request-list')->with(['userRequests' => $this->filter()]);
    }
}
