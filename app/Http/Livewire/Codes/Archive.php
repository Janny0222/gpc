<?php

namespace App\Http\Livewire\Codes;

use App\Models\CV;
use Livewire\Component;
use Livewire\WithPagination;

class Archive extends Component
{
    use WithPagination;
    public $search;

    protected $listeners = [
        'refresh-codes' => '$refresh',
    ];
    public function render()
    {
        $query = CV::where('status_id', 2)->orderBy('created_at', 'asc');

        if($this->search) {
            $codes = $query->where(function ($query) {
                $query->where('name', 'like', '%'. $this->search . '%')
                ->orWhere('code', 'like', '%' . $this->search . '%');
            });
        } else {
            $codes = $query->paginate(5);
        }
        return view('livewire.codes.archive')->with('codes', $codes);
     }

    public function activate($id){
        $codes = CV::find($id);

        $codes->status_id = 1;

        $status = 'success';
        $message = $codes->name . ' Successfull activate';
        $this->emit('show-notif', $status, $message);

        $codes->save();
    }
}
