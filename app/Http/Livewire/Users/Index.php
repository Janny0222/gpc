<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{   

    use WithPagination;

    protected $listeners = [
        'refresh-users' => '$refresh',
    ];


    public $search;
    public function render()
    {
        
        $users = User::search($this->search)->orderBy('created_at', 'asc')->paginate(5);
        
        return view('livewire.users.index')->with('users', $users);
        
    }
    public function openCreateModal()
    {
        
        dd("Hello");
        // $this->action = 'store';
        // $this->form_title = 'Add';
        // $this->button_name = 'Submit';
      
        // $this->isCreateEditModalOpen = true;
    }

    
    
}
