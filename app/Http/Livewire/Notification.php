<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $status;
    public $message;
    public $notification = false;

    protected $listeners = [
        'show-notif' => 'show',
    ];

    public function render()
    {
        return view('livewire.notification');
    }

    public function show($status, $message){
        $this->status = $status;
        $this->message = $message;
        $this->notification = true;
    }
}
