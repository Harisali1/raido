<?php

namespace App\Http\Livewire;

use App\Models\UserRequest;
use Livewire\Component;
use Livewire\WithPagination;

class UserRequestList extends Component
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
//        dd($status);
        $this->search = $status;
    }

    protected function filter()
    {
        $userRequest = UserRequest::with('vehicleType', 'driver', 'user');

        if ($this->search) {
            $userRequest = $userRequest
                ->where('status', 'like', "%{$this->search}%");
        }
        return $userRequest
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.user-request-list')->with(['userRequests' => $this->filter()]);
    }
}
