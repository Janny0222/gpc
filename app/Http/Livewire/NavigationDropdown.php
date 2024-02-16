<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Str;
use App\Models\Location;

class NavigationDropdown extends Component
{
    public $location;

    protected $listeners = [
        'refresh-navigation-dropdown' => '$refresh',
    ];

    public function render()
    {
        // Check if location session is set
        if (session()->get('location_id')) {
            $this->location = session()->get('location_id');
        } else {
            session()->put('location_id', Auth::user()->default_location);
            $this->location = Auth::user()->default_location;
        }

        

        return view('livewire.navigation-dropdown');
    }

 
}
