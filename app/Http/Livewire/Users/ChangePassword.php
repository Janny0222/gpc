<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $name;
    public $password;
    public $password_confirmation;
   

    public $isChangePasswordModalOpen = false;

    protected $listeners = [
        'open-change-password-modal' => 'openChangePasswordModal',
    ];
 
    public function render()
    {
        return view('livewire.users.change-password');
    
    }
    
    public function openChangePasswordModal($id)
    {

        $user = User::find($id);

        $this->uid = $user->id;
        $this->name = $user->name;

        $this->isChangePasswordModalOpen = true;
    }

    public function closeChangePasswordModal()
    {

        $this->isChangePasswordModalOpen = false;
        $this->reset(['password', 'password_confirmation']);
    }

    public function changePassword()
    {
        $this->validate([
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $changePassword = User::where('id', $this->uid)->firstOrFail()->update([
            'password' => Hash::make($this->password),
        ]);

        $status = 'success';
        $message = 'Change Password Successfully';
        $this->emit('show-notif', $status, $message);   
                        
        $this->reset(['password', 'password_confirmation']);

        $this->isChangePasswordModalOpen = false;
    }
}
