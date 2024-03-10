<?php

namespace App\Http\Livewire\Properties;

use Livewire\Component;

class AddWarehouse extends Component
{
    public $isCreateModalOpen = false;
    public $action;
    public $form_title;
    public $note1;
    public $note2;

    protected $listeners = [
        'open-add-modal' => 'openAddModal',
    ];
    public function render()
    {
        return view('livewire.properties.add-warehouse');
    }
    public function openAddModal()
        {
            $this->form_title = 'Add';
            $this->action = "store";
            $this->isCreateModalOpen = true;
            
        }

        public function closeAddModal()
    {
        $this->reset(['note1', 'note2']);
        $this->isCreateModalOpen = false;
    }
    public function saveWarehouse(){
        //
        $this->validate([
            'note1' => ['required'],
            'note2' => ['required'],
            
        ]);

        $this->emit('warehouseSaved', ['note1' => $this->note1, 'note2' => $this->note2]);

        $this->reset(['note1', 'note2']);
        $this->closeAddModal();
    }
}
