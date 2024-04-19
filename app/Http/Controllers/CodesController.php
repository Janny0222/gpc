<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodesController extends Controller
{
    //
    public function index()
    {
        return view('codes.index');
    }

    public function archive()
    {
        return view('codes.archive');
    }
}
