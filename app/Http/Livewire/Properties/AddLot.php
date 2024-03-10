<?php

namespace App\Http\Livewire\Properties;

use App\Models\Lot;
use Livewire\Component;
use Livewire\WithPagination;

class AddLot extends Component
{

    use WithPagination;
    public $isCreateModalOpen = false;
    public $action;
    public $form_title;
    public $area;
    public $tct;

    
    public $search;
    protected $listeners = [
        'open-add-modal' => 'openAddModal',
        'refresh-lots' => '$refresh',
    ];
    public function render()
    {
        $lot = Lot::search($this->search)->paginate(5);
        return view('livewire.properties.add-lot')->with('lot', $lot);;
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
        
        $this->emit('lotSaved', ['area' => $this->area, 'tct' => $this->tct]);
        

        $this->reset(['area', 'tct']);
        $this->closeAddModal();
    }
    
}
