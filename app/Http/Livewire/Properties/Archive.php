<?php

namespace App\Http\Livewire\Properties;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class Archive extends Component
{
    use WithPagination;
    public $search;


    public function render()
    {
        $query = Property::where('status_id', 2)->orderBy('created_at', 'asc');

        if($this->search){
            $properties = $query->where(function ($query) {
                $query->where('cvno', 'like', '%' . $this->search . '%')
                    ->orWhere('area', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })->paginate(5);
        } else {
            $properties = $query->paginate(5);
        }
        return view('livewire.properties.archive')->with('properties', $properties);
    }

    public function activate($id) {
        $property = Property::find($id);

        $property->status_id = 1;
        $status = 'success';
        $message = $property->cvno . ' has successfully Activated';
        $this->emit('show-notif', $status, $message);
        $property->save();

        // $this->emit('show-toast', 'Property activate successfully!', 'success');
    }
}
