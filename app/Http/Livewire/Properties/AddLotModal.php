<?php

namespace App\Http\Livewire\Properties;

use App\Models\Lot;
use Livewire\Component;

class AddLotModal extends Component
{

    public $isCreateModalOpen = false;
    public $action;
    public $form_title;
    public $lid;
    public $area;
    public $tct;
    public $button_name;

    protected $listeners = [
        'open-add-modal' => 'openAddModal',
        'open-edit-modal' => 'openEditModal',
        'open-view-modal' => 'openViewModal',
    ];
    public function render()
    {
        return view('livewire.properties.add-lot-modal');
    }
    public function openViewModal($id){
        $this->form_title = 'View';
        $this->action = "";
        $this->button_name = "View Only";
        $lot = Lot::find($id);

        $this->lid = $lot->id;
        $this->area = $lot->area;
        $this->tct = $lot->tct;

        $this->isCreateModalOpen = true;
    }

    // Modal for create
    public function openAddModal(){
        $this->form_title = 'Add';
        $this->action = "store";
        $this->button_name = "Saved";
        $this->isCreateModalOpen = true;
    }

    // function for closing Modal
    public function closeAddModal() {
        $this->reset(['tct', 'area']);
        $this->isCreateModalOpen = false;
    }

    // Modal for edit
    public function openEditModal($id){
        $this->form_title = 'Edit';
        $this->action = "update";
        $this->button_name = "Update";

        $lot = Lot::find($id);

        $this->lid = $lot->id;
        $this->area = $lot->area;
        $this->tct = $lot->tct;

        $this->isCreateModalOpen = true;

        
    }
    public function update() {
        $this->validate([
            'area' => ['required'],
            'tct' => ['required'],
        ]);
    
        $lot = Lot::where('id', $this->lid);
        
        $update = $lot->firstOrFail()->update([
            'area' => $this->area,
            'tct' => $this->tct
        ]);
        $this->emit('refresh-lots');
        // Notification
        $status = 'success';
        $message = 'Lot Successfully updated.';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;

        $this->reset(['area', 'tct',]);

    }
    public function store(){
        $this->validate([
            'area' => ['required'],
            'tct' => ['required'],
        ]);

        $lot = Lot::create([
            'area' => $this->area,
            'tct' => $this->tct,
        ]);

        $this->emit('refresh-lots');
        // Notification
        $status = 'success';
        $message = 'New Lot successfully added.';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;

        $this->reset(['area', 'tct',]);
    }
    
}