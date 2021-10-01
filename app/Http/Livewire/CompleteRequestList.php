<?php

namespace App\Http\Livewire;

use App\Models\UserRequest;
use Livewire\Component;
use Livewire\WithPagination;

class CompleteRequestList extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'completeRequestDeleted' => 'deleteCompleteRequest',
    ];

    public function deleteCompleteRequest($id)
    {
        UserRequest::find($id)->delete();
    }


    protected function filter()
    {
        $userRequest = UserRequest::with('vehicleType', 'driver', 'user')->whereStatus('COMPLETED');

        if ($this->search) {
            $userRequest = $userRequest
                ->where('status', 'like', "%{$this->search}%")
                ->orWhere('booking_id', 'like', "%{$this->search}%")
                ->orWhere('start_address', 'like', "%{$this->search}%")
                ->orWhere('amount', 'like', "%{$this->search}%")
                ->orWherehas('driver', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%");
                })
                ->orWhereHas('user', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%");
                })
                ->orWhereHas('vehicleType', function ($query) {
                    $query->where('title', 'like', "%{$this->search}%");
                });
        }
        return $userRequest
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.complete-request-list')->with(['completeRequests' => $this->filter()]);
    }
}
