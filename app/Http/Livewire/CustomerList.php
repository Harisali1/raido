<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'customerDeleted' => 'deleteCustomer',
        'statusUpdated' => 'updateCustomerStatus'
    ];

    public function deleteCustomer($id)
    {
        User::find($id)->delete();
    }

    public function updateCustomerStatus(User $customer)
    {
        $customer->update([
            'status' => !$customer->status
        ]);
    }

    protected function filter()
    {
        $customer = User::query();

        if ($this->search) {
            $customer = $customer
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('cnic', 'like', "%{$this->search}%")
                ->orWhere('mobile', 'like', "%{$this->search}%");
        }
        return $customer
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.customer-list')->with(['customers' => $this->filter()]);
    }
}
