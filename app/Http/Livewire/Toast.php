<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public $message;
    public $type;

    protected $listeners = [
        'show-toast' => 'show',
    ];

    public function render()
    {
        return view('livewire.toast');
    }


    public function show($message, $type){
        $this->message = $message;
        $this->type = $type;
        
    }
}
