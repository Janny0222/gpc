<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $updatedRowId;
    public $highlightedCompanyId;
    protected $listeners = [
        'refresh-company' => '$refresh',
        'companyUpdated' => 'handleCompanyUpdated',
    ];
    public function handleCompanyUpdated($companyId)
    {
        $this->updatedRowId = $companyId;
        $this->highlightedCompanyId = $companyId;
        $this->resetHighlightedCompanyAfterDelay();
        
    }

    public function runTesting()
    {
        $this->dispatchBrowserEvent('run-testing');
    }

    protected function resetHighlightedCompanyAfterDelay()
    {
        $this->dispatchBrowserEvent('reset-highlighted-company', ['delay' => 1000]);
    }
    public function render()
    {
        $query = Company::where('status_id', 1)->orderBy('created_at', 'asc');
        
        if ($this->search) {
            $companies = $query->where(function ($query) {
                $query->where('code_id', 'like', '%' . $this->search . '%')
                      ->orWhere('company_name', 'like', '%' . $this->search . '%')
                      ->orWhere('owners_name', 'like', '%' . $this->search . '%')
                      ->orWhere('tin', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%');
            })->paginate(5);

        } else {
            $companies = $query->paginate(5);
        }
        return view('livewire.companies.index', [
            'company' => $companies,
            'updatedRowId' => $this->updatedRowId
        ]);
        
    }

    
    public function archive($id){
        $company = Company::find($id);

        $company->status_id = 2;
        

        $status = 'success';
        $message = 'Successfully Archived';
        $this->emit('show-notif', $status, $message);

        $company->save();
    }
}
