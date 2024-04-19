<?php

namespace App\Http\Livewire\Properties;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $updatedRowId;
    public $highlightedPropertyId;

    protected $listeners = [
        'refresh-lots' => '$refresh',
        'propertyUpdated' => 'handlePropertyUpdated'
    ];

    public function handlePropertyUpdated($propertyId) {
        $this->updatedRowId = $propertyId;
        $this->highlightedPropertyId = $propertyId;
    }

    public function resetHighlightedProperty() {
        $this->dispatchBrowserEvent('reset-highlighted-property', ['delay' => 2000]);
    }

    public function render()
    {
        $properties = Property::where('status_id', 1)->orderBy('created_at', 'asc');
        if ($this->search) {
            $properties = $properties->where(function ($query) {
                $query->where('cvno', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%')
                      ->orWhere('area', 'like', '%' . $this->search . '%');
            })->paginate(5);
        } else {
            $properties = $properties->paginate(5);
        }
        return view('livewire.properties.index')->with('properties', $properties);
    }

    public function archive($id){
        $properties = Property::find($id);

        $properties->status_id = 2;
        

        $status = 'success';
        $message = 'CV No. ' . $properties->cvno . ' Successfully Archived';
        $this->emit('show-notif', $status, $message);
        // $this->emit('show-toast', 'Property archived successfully!', 'success');
        $properties->save();

        
    }
}
