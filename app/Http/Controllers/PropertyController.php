<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public $area;
    public $tct;
    public $pid;
    public $cvno;
    public $count;
    public $address;
    public $warehouse;
    public $project;
    public $note1;
    public $note2;

    public function index()
    {
        return view('properties.index');
    }
    public function create(){
        return view('properties.add-property');
    }
    public function update(Property $id){
        $property = Property::find($id);
        $this->pid = $property->id;
        $this->address = $property->address;
        $this->area = $property->area;

        return view('livewire.properties.edit-property')->with('property', $property);
    }
    public function archive()
    {
        return view('properties.archive');
    }
    
}
