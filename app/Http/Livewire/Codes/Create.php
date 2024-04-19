<?php

namespace App\Http\Livewire\Codes;

use App\Models\CV;
use Livewire\Component;

class Create extends Component
{   
    public $cid;
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

    //  function for Modal Create
    public function openCreateModal()
    {
        $this->action = 'store';
        $this->form_title = 'Add';
        $this->button_name = 'Submit';
        $this->isCreateModalOpen = true;
        // $this->isCreateEditModalOpen = true;
    }

    // function for Modal Edit
    public function openEditModal($id){
        $this->action = 'update';
        $this->form_title = 'Edit';
        $this->button_name = 'Update';

        $codes = CV::find($id);

        $this->cid = $codes->id;
        $this->name = $codes->name;
        $this->code = $codes->code;

        $this->isCreateModalOpen = true;
    }
    public function update(){
        $this->validate([
            'name' => ['required'],
            'code' => ['required'],
        ]);

        $codes = CV::where('id', $this->cid);
        $update = $codes->firstOrFail()->update([
            'name' => $this->name,
            'code' => $this->code,
        ]);
        $this->emit('refresh-codes');

        $status = 'success';
        $message = $this->name .' Successfully updated';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;
        $this->reset(['name', 'code']);
    }
    public function store()
    {
        $this->validate([
            'name' => ['required'],
            'code' => ['required'],
            
        ]);

        $codes = CV::create([
            'name' => $this->name,
            'code' => $this->code,
        ]);

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
