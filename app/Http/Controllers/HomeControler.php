<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControler extends Controller
{
    public function index()
    {
        return view('Layout-Dashboard.main');
    }
}
