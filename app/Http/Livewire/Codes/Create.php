<?php

namespace App\Http\Livewire\Codes;

use App\Models\CV;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $code;
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
        return view('livewire.codes.create');
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
            'name' => ['required'],
            'code' => ['required'],
            
        ]);
        
        // Check if the selected default location is included in the chosen locations
        // $selected_locations = collect($this->selected_locations);
        // if (!$selected_locations->contains($this->default_location)) {
        //     // Display error message
        //     return false;
        // }

        $codes = CV::create([
            'name' => $this->name,
            'code' => $this->code,
        ]);

        // $user->locations()->attach($this->selected_locations);

        // Refresh vouchers list
        $this->emit('refresh-codes');
        
        // Notification
        $status = 'success';
        $message = 'New code successfully added.';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;

        $this->reset(['name', 'code',]);
    }
    public function closeAddModal()
    {
        //$this->reset(['tct', 'area']);
        $this->isCreateModalOpen = false;
        
    }
    
}
