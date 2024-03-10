<?php

namespace App\Http\Livewire\Codes;

use App\Models\CV;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    protected $listeners = [
        'refresh-codes' => '$refresh',
    ];
    public function render()
    {
        $codes = CV::search($this->search)->paginate(5);
        return view('livewire.codes.index')->with('codes', $codes);
    }
}
