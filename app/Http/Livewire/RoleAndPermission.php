<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleAndPermission extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'roleDeleted' => 'deleteRole',
    ];

    public function deleteRole($id)
    {
        Role::find($id)->delete();
    }

    protected function filter()
    {
        $role = Role::query();

        if ($this->search) {
            $role = $role
                ->where('label', 'like', "%{$this->search}%");
        }
        return $role
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.role-and-permission')->with(['roles' => $this->filter()]);
    }

}
