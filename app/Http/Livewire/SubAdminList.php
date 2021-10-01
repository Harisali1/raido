<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class SubAdminList extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'subAdminDeleted' => 'deleteSubAdmin',
        'statusUpdated' => 'updateAdminStatus'
    ];

    public function deleteSubAdmin($id)
    {
        Admin::find($id)->delete();
    }

    public function updateAdminStatus(Admin $subAdmin)
    {
        $subAdmin->update([
            'status' => !$subAdmin->status
        ]);
    }

    protected function filter()
    {
        $subAdmin = Admin::query()->where('id', '>', 1);


        if ($this->search) {
            $subAdmin = $subAdmin
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('mobile', 'like', "%{$this->search}%");
        }
        return $subAdmin
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.sub-admin-list')->with(['subAdmins' => $this->filter()]);
    }
}
