<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use App\Models\CV;
use App\Models\Status;
use Livewire\Component;

class Create extends Component
{
    public $cid;
    public $code_id;
    public $company_name;
    public $owners_name;
    public $tin;
    public $address;
    public $status_id = 1;

    public $form_title;
    public $action;
    public $button_name;

    public $isCreateModalOpen = false;
    
    public $updatedRowId;

    protected $listeners = [
        'open-create-modal' => 'openCreateModal',
        'open-edit-modal' => 'openEditModal',
    ];

    public function render()
    {
        $cv = CV::all();
        $status = Status::all();
        return view('livewire.companies.create', [
            'cv' => $cv, 
            'statuses' => $status,
            'updatedRowId' => $this->updatedRowId,
        ]);
        
    }
    public function openEditModal($id){
        $this->action = 'update';
        $this->form_title = 'Edit';
        $this->button_name = 'Update';

        $company = Company::find($id);
        
        $this->cid = $company->id;
        $this->code_id = $company->code_id;
        $this->company_name = $company->company_name;
        $this->owners_name = $company->owners_name;
        $this->tin = str_replace('-', '', $company->tin);
        $this->address = $company->address;
        $this->updatedRowId = $this->cid;
        $this->isCreateModalOpen = true;

        // dd($this->cid);
    }
    public function openCreateModal(){
        $this->action = 'store';
        $this->form_title = 'Add';
        $this->button_name = 'Submit';

        $this->isCreateModalOpen = true;
        
    }
    public function update(){
        $validatedData = $this->validate([
            'code_id' => ['required'],
            'company_name' => ['required'],
            'owners_name' => ['required'],
            'tin' => ['required', 'numeric', 'digits_between:9,12'],
            'address' => ['required'],
        ]);

        $company = Company::where('id', $this->cid);

        $formatedTin = implode('-', str_split($this->tin, 3));
        $update = $company->firstOrFail()->update([
            'company_name' => $this->company_name,
            'owners_name' => $this->owners_name,
            'tin' => $formatedTin,
            'address' => $this->address,
            'code_id' => $this->code_id,
        ]);

        
        
        $this->emit('refresh-company');
        $this->emit('highlight-company',['id' => $this->cid]);
        $this->emit('reset-highlight-company',['delay' => 1000]);
        
        $status = 'success';
        $message = 'Successfully Updated';
        $this->emit('show-notif', $status, $message);
       
            
        
        $this->isCreateModalOpen = false;

        $this->reset(['code_id', 'company_name', 'owners_name', 'tin', 'address']);
    }

    

    public function store(){
        $this->validate([
            'code_id' => ['required'],
            'company_name' => ['required'],
            'owners_name' => ['required'],
            'tin' => ['required', 'numeric', 'digits_between:9,12'],
            'address' => ['required'],
        ]);
        $formatedTin = implode('-', str_split($this->tin, 3));
        $company = new Company();
        $company->code_id = $this->code_id;
        $company->company_name = $this->company_name;
        $company->owners_name = $this->owners_name;
        $company->tin = $formatedTin;
        $company->address = $this->address;
        $company->status_id = $this->status_id;
        $company->save();
        // $companies = Company::create([
        //     'code_id' => $this->code_id,
        //     'company_name' => $this->company_name,
        //     'owners_name' => $this->owners_name,
        //     'status_id' => 1,
        //     'tin' => $formatedTin,
        //     'address' => $this->address,
        // ]);

        $this->emit('refresh-company');

        $status = 'success';
        $message = 'New Company successfully added.';
        $this->emit('show-notif', $status, $message);

        $this->isCreateModalOpen = false;

        $this->reset(['code_id', 'company_name', 'owners_name', 'tin', 'address']);
    }

    public function closeAddModal()
    {
        $this->reset(['code_id', 'company_name', 'owners_name', 'tin', 'address']);
        $this->isCreateModalOpen = false;

    }
}
