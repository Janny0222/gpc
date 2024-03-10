<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;

    protected $listeners = [
        'refresh-company' => '$refresh',
    ];

    public function render()
    {
        $companies = Company::search($this->search)->orderBy('created_at', 'asc')->paginate(5);
        // dd($companies->toArray());
        return view('livewire.companies.index')->with('company', $companies);
    }
}
