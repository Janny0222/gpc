<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Archive extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {   
        $query = Company::where('status_id', 2)->orderBy('created_at', 'asc');

        if ($this->search) {
            $companies = $query->where(function ($query) {
                $query->where('codes', 'like', '%' . $this->search . '%')
                      ->orWhere('company_name', 'like', '%' . $this->search . '%')
                      ->orWhere('owners_name', 'like', '%' . $this->search . '%')
                      ->orWhere('tin', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%');
            })->paginate(5);
        } else {
            $companies = $query->paginate(5);
        }
        return view('livewire.companies.archive')->with('company', $companies);
    }
    

    public function activate($id){
        $company = Company::find($id);

        $company->status_id = 1;
        

        $status = 'success';
        $message = $company->company_name . ' ' . 'Successfully Activated';
        $this->emit('show-notif', $status, $message);

        $company->save();
    }
}
