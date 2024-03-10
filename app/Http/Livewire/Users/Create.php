<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Status;
use App\Models\Location;

class Create extends Component
{
    public $uid;
    public $name;
    public $username;
    public $email;
    public $status_id;
    public $password;
    public $password_confirmation;
    public $default_location;
    public $old_selected_locations = [];
    public $selected_locations = [];

    public $action;
    public $form_title;
    public $button_name;

    public $isCreateModalOpen = false;

    protected $listeners = [
        'open-create-modal' => 'openCreateModal',
        'open-edit-modal' => 'openEditModal',
    ];
    
    public function render()
    {
        $statuses = Status::all();
      //  $locations = Location::orderBy('name', 'asc')->get();

        return view('livewire.users.create', compact('statuses'));
    }

        public function openCreateModal()
        {
            
            $this->action = 'store';
            $this->form_title = 'Add';
            $this->button_name = 'Submit';
            $this->isCreateModalOpen = true;
            // $this->isCreateEditModalOpen = true;
        }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'unique:users'],
            'username' => ['required', 'unique:users'],
            'email' => ['nullable', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            
        ]);
        
        // Check if the selected default location is included in the chosen locations
        // $selected_locations = collect($this->selected_locations);
        // if (!$selected_locations->contains($this->default_location)) {
        //     // Display error message
        //     return false;
        // }

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'status_id' => 1,
        ]);

        // $user->locations()->attach($this->selected_locations);

        
        $this->emit('refresh-users');
        
        // Notification
        $status = 'success';
        $message = 'New User successfully added.';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;

        $this->reset(['name', 'username', 'email', 'password', 'password_confirmation', 'selected_locations',]);
    }

    public function openEditModal($id)
    {
        $this->action = 'update';
        $this->form_title = 'Edit';
        $this->button_name = 'Update';

        $user = User::find($id);

        $this->uid = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->status_id = $user->status_id;
        

        $this->isCreateModalOpen = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => ['required', Rule::unique('users')->ignore($this->uid),],
            'username' => ['required', Rule::unique('users')->ignore($this->uid),],
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($this->uid),],
            'status_id' => ['required', 'numeric'],
        ]);

        $user = User::where('id', $this->uid);

        // Check if the selected default location is included in the chosen locations
        // $selected_locations = collect($this->selected_locations);
        // if (!$selected_locations->contains($this->default_location)) {
        //     // Display error message

        //     return;
        // }

        $update = $user->firstOrFail()->update([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'status_id' => $this->status_id,
        ]);

        // $sync = $user->first()->locations()->sync($this->selected_locations);

        // Log if theres a changes.
        // if ($this->selected_locations != $this->old_selected_locations) {
        //     // Log the sync to related model.
        //     activity()
        //         ->performedOn($user->first())
        //         ->causedBy(auth()->user())
        //         ->withProperties(['attributes' => $this->selected_locations, 'old' => $this->old_selected_locations])
        //         ->log(':causer.name updated the location(s) of :subject.name account.');
        // }

        
        $this->emit('refresh-users');

        // Notification
        $status = 'success';
        $message = 'User successfully updated.';
        $this->emit('show-notif', $status, $message);

        // Refresh Navigation Dropdown
        // $this->emit('refresh-navigation-dropdown');

        $this->reset(['name', 'username', 'email', 'status_id',]);

        $this->isCreateModalOpen = false;
    }

    public function closeCreateModal()
    {
        $this->isCreateModalOpen = false;
        $this->reset(['name', 'username', 'email', 'status_id']);
    }
}
