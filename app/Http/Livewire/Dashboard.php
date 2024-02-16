<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.properties.index');
    }
}
