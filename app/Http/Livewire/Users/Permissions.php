<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    public $isPermissionModal = false;
    
    public $uid;
    public $name;
    public $index = 0;

    public $old_selected_permissions = [];
    public $selected_permissions = [];

    protected $listeneres = [
        'open-permissions-modal' => 'openPermissionModal',
    ];

    public function mount()
    {
        $user = User::find($this->uid);

        $permission_ids = [];
        foreach($user->permissions as $permission){
            $permission_ids[] = $permission->id;
        }

        $this->old_selected_permissions = $permission_ids;
        $this->selected_permissions = $permission_ids;

        $this->name = $user->name;
    }
    public function render()
    {
        //$dashboards = Permission::where('name', 'like', '%-dashboard%')->get();
        $users = Permission::where('name', 'like', '%-users%')->get();
        $dashboards = Permission::where('name', 'like', '%-dashboard%')->get();

        return view('livewire.users.permissions', compact(
            'dashboards',
            'users',
        ));
    }

    public function store()
    {
        $user = User::find($this->uid);
        $sync = $user->syncPermissions($this->selected_permissions);

        $this->emit('refresh-sidebar');

        $status = 'success';
        $message = 'User permissions successfully updated.';
        $this->emit('show-notif', $status, $message);
    }
}
