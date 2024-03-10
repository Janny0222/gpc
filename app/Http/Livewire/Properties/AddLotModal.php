<?php

namespace App\Http\Livewire\Properties;

use App\Models\Lot;
use Livewire\Component;

class AddLotModal extends Component
{

    public $isCreateModalOpen = false;
    public $action;
    public $form_title;
    public $area;
    public $tct;

    protected $listeners = [
        'open-add-modal' => 'openAddModal',
    ];
    public function render()
    {
        return view('livewire.properties.add-lot-modal');
    }

    public function openAddModal()
        {
            $this->form_title = 'Add';
            $this->action = "store";
            $this->isCreateModalOpen = true;
            
           
        }

        public function closeAddModal()
    {
        $this->reset(['tct', 'area']);
        $this->isCreateModalOpen = false;
    }
    public function saveLot(){
        
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