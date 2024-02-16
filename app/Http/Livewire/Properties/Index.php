<?php

namespace App\Http\Livewire\Properties;

use Livewire\Component;

class Index extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.properties.index');
    }
}
