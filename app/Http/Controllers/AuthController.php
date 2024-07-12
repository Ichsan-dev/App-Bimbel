<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
        public function admin()
    {
        return view('poinAkses.admin.index');
    }
        public function operator()
    {
        return view('poinAkses.operator.index');
    }
        public function owner()
    {
        return view('poinAkses.owner.index');
    }
        public function orangtua()
    {
        return view('poinAkses/orangtua/index');
    }
    
        public function siswa()
    {
        return view('poinAkses.siswa.index');
    }
    
        public function calonsiswa()
    {
        return view('poinAkses.calonsiswa.index');
    }
    public function guru()
    {
        return view('poinAkses.guru.index');
    }
}
