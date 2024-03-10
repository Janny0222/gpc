<?php

namespace App\Http\Livewire\Properties;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    protected $listeners = [
        'refresh-lots' => '$refresh',
    ];
    public function render()
    {
        $properties = Property::search($this->search)->orderBy('created_at', 'asc')->paginate(5);
        return view('livewire.properties.index')->with('properties', $properties);
    }
}
