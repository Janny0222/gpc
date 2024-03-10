<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddLotController extends Controller
{
    //
    public function render(){
        return view('properties.lot.add-lot');
    }

    public function index(){
        return view('properties.lot.add-lot');
    }
}
