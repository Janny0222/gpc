<?php

namespace App\Http\Livewire\Properties;

use App\Models\CV;
use App\Models\Lot;
use App\Models\Property;
use Livewire\Component;

class EditProperty extends Component
{

    public $area;
    public $tct;
    public $pid;
    public $cvno;
    public $count;
    public $lot_id;
    public $status_id;
    public $address;
    public $warehouse;
    public $project;
    public $note1;
    public $note2;

    public $form_title;
    public $action;
    public $button_name;

    public $isCreateModalOpen = false;

    protected $listeners = [
        'open-create-modal' => 'openCreateModal',
        'open-edit-modal' => 'openEditModal',
    ];

    public function render()
    {
        $lot = Lot::all();
        $codes = CV::all();
        return view('livewire.properties.edit-property', [
            'lot' => $lot,
            'codes' => $codes,
        ]);
    }
    public function openEditModal($id){
        $this->action = 'update';
        $this->form_title = 'Edit';
        $this->button_name = 'Update';

        $lot = Lot::all();
        $property = Property::find($id);
        $this->pid = $property->id;
        $this->cvno = $property->cvno;
        $this->address = $property->address;
        $this->lot_id = $property->lot_id;
        $this->status_id = $property->status_id;

        
        $this->isCreateModalOpen = true;
    }
    public function update() {
        $validatedData = $this->validate([
            'lot_id' => ['required'],
            'address' => ['required'],
        ]);

        $property = Property::where('id', $this->pid);
        $update = $property->firstOrFail()->update([
            'lot_id' => $this->lot_id,
            'address' => $this->address,
        ]);

        $this->emit('refresh-lots');
        // This is for highlight effect when successfully edit
        $this->emit('highlight-property',['id' => $this->pid]);
        $this->emit('reset-highlight-property',['delay' => 2000]);

        $status = 'success';
        $message = $this->cvno .  ' updated successfully.';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;

        $this->reset(['cvno', 'address', 'lot_id']);
    }
    public function closeModal(){
        $this->isCreateModalOpen = false;
        $this->reset(['cvno', 'address', 'lot_id']);
    }
}
    // public function update($id){

    // }

    // public function openEditModal($id){
       

    //     $company = Company::find($id);
        
    //     $this->cid = $company->id;
    //     $this->codes = $company->codes;
    //     $this->company_name = $company->company_name;
    //     $this->owners_name = $company->owners_name;
    //     $this->tin = str_replace('-', '', $company->tin);
    //     $this->address = $company->address;

    //     $this->isCreateModalOpen = true;
    // }

