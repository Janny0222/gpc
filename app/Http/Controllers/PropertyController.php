<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('properties.index');
    }
    public function create(){
        return view('properties.add-property');
    }
}
