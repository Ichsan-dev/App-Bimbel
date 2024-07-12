<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function index()
    {
        
        return view('poinAkses.siswa.kuis.index');
    }
    public function kuis()
    {
        return view('poinAkses.siswa.kuis.Quiz');
    }
}
