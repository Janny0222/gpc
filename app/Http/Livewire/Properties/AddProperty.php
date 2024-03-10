<?php

namespace App\Http\Livewire\Properties;

use App\Models\CV;
use App\Models\Lot;
use App\Models\Property;
use Livewire\Component;

class AddProperty extends Component
{
    public $area;
    public $tct;
    public $cvno;
    public $count;
    public $address;
    public $warehouse;
    public $project;
    public $note1;
    public $note2;

    protected $listeners = [
        'lotSaved' => 'updateLot',
        'warehouseSaved' => 'updateWarehouse',
    ];

    public $isAddPropertyModal = false;
    public function mount(){
        $codes = Property::latest()->first();
       //  dd($codes);
        if($codes){
            $this->cvno = $codes->cvno + 1;
        }else{
            $this->cvno = 1001;
        }
    }
    public function render()
    {
        $lot = Lot::all();
        $codes = CV::all();
        return view('livewire.properties.add-property', [
            'lot' => $lot,
            'codes' => $codes,
        ]);
    }

    public function store(){
        $this->validate([
            'cvno' => ['required'],
            'area' => ['required'],
            'address' => ['required'],
        ]);

        $property = Property::create([
            'cvno' => $this->cvno,
            'address' => $this->address,
            'area' => $this->area,
        ]);

        $this->reset(['cvno', 'address', 'area']);

        $status = 'success';
        $message = 'New Property successfully added.';
        $this->emit('show-notif', $status, $message);
        
        return redirect()->route('properties.index');
    }

    public function closeCreateModal()
    {
        $this->isAddPropertyModal = false;
        
    }
    public function updateLot($data)
        {
            $this->area = $data['area'];
            $this->tct = $data['tct'];
        }

    public function updateWarehouse($data)
    {
        $this->note1 = $data['note1'];
        $this->note2 = $data['note2'];
    }    
}
