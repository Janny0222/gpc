<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use App\Models\CV;
use Livewire\Component;

class Create extends Component
{
    public $cid;
    public $codes;
    public $company_name;
    public $owners_name;
    public $tin;
    public $address;

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
        $cv = CV::all();
        
        return view('livewire.companies.create')->with('cv', $cv);
        
    }
    public function openEditModal($id){
        $this->action = 'update';
        $this->form_title = 'Edit';
        $this->button_name = 'Update';

        $company = Company::find($id);
        
        $this->cid = $company->id;
        $this->codes = $company->codes;
        $this->company_name = $company->company_name;
        $this->owners_name = $company->owners_name;
        $this->tin = str_replace('-', '', $company->tin);
        $this->address = $company->address;

        $this->isCreateModalOpen = true;
    }
    public function openCreateModal(){
        $this->action = 'store';
        $this->form_title = 'Add';
        $this->button_name = 'Submit';

        $this->isCreateModalOpen = true;
        
    }
    public function update(){
        $validatedData = $this->validate([
            'codes' => ['required'],
            'company_name' => ['required'],
            'owners_name' => ['required'],
            'tin' => ['required', 'numeric', 'digits_between:9,12'],
            'address' => ['required'],
        ]);

        $company = Company::where('id', $this->cid);

        $formatedTin = implode('-', str_split($this->tin, 3));
        $update = $company->firstOrFail()->update([
            'codes' => $this->codes,
            'company_name' => $this->company_name,
            'owners_name' => $this->owners_name,
            'tin' => $formatedTin,
            'address' => $this->address,
        ]);

        $this->emit('refresh-company');

        $status = 'success';
        $message = 'Successfully Updated';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;

        $this->reset(['codes', 'company_name', 'owners_name', 'tin', 'address']);
    }

    

    public function store(){
        $this->validate([
            'codes' => ['required'],
            'company_name' => ['required'],
            'owners_name' => ['required'],
            'tin' => ['required', 'numeric', 'digits_between:9,12'],
            'address' => ['required'],
        ]);
        $formatedTin = implode('-', str_split($this->tin, 3));
        $companies = Company::create([
            'codes' => $this->codes,
            'company_name' => $this->company_name,
            'owners_name' => $this->owners_name,
            'tin' => $formatedTin,
            'address' => $this->address,
        ]);

        $this->emit('refresh-company');

        $status = 'success';
        $message = 'New Company successfully added.';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;

        $this->reset(['codes', 'company_name', 'owners_name', 'tin', 'address']);
    }

    public function closeAddModal()
    {
        $this->reset(['codes', 'company_name', 'owners_name', 'tin', 'address']);
        $this->isCreateModalOpen = false;

    }
}
