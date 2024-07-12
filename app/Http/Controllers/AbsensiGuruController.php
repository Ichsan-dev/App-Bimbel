<?php

namespace App\Http\Controllers;


use App\Models\AbsensiKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiGuruController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        $karyawan = $user->karyawan;

        // Pastikan karyawan tidak null
        if (!$karyawan) {
            return redirect()->route('guru')->with('error', 'Karyawan tidak ditemukan untuk pengguna ini.');
        }
        
        // Mengambil jadwal yang sesuai dengan siswa_id dari user yang sedang login
        $absensiguru = AbsensiKaryawan::where('karyawan_id', $karyawan->id)->get();
        return view('poinAkses/guru/Absensi/index', compact('absensiguru'));
    }
}
