<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use App\Models\karyawan;
use App\Models\PembayaranSpp;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OwnerController extends Controller
{
    public function siswa()
    {
        $datasiswa = Siswa::get();
        return view('poinAkses/owner/LaporanSiswa/index', compact('datasiswa'));
    }
    public function karyawan()
    {
        $datakaryawan = karyawan::get();
        return view('poinAkses/owner/LaporanKaryawan/index', compact('datakaryawan'));
    }
    public function spp()
    {
        $dataspp = PembayaranSpp::get();
        return view('poinAkses/owner/LaporanSpp/index', compact('dataspp'));
    }
    public function gaji()
    {
        $datagaji = GajiKaryawan::get();
        return view('poinAkses/owner/LaporanGaji/index', compact('datagaji'));
    }
    public function index()
    {
     // Menggunakan cache untuk menyimpan jumlah siswa dan karyawan selama 60 menit
        $totalSiswa = Cache::remember('totalSiswa', 60, function () {
            return Siswa::count();
        });

        $totalKaryawan = Cache::remember('totalKaryawan', 60, function () {
            return Karyawan::count();
        });

         // Menghitung jumlah siswa berdasarkan status
        $totalSiswaAktif = Siswa::where('status', 'active')->count();
        $totalSiswaNonAktif = Siswa::where('status', 'inactive')->count();

        // Mengirim data ke view
        return view('poinAkses.owner.index', compact('totalSiswa', 'totalKaryawan', 'totalSiswaAktif', 'totalSiswaNonAktif'));

    }
    public function siswaAktif()
    {
        $siswaaktif = Siswa::where('status', 'active')->get();

        return view('poinAkses/owner/LaporanSiswa/siswaAktif', compact('siswaaktif'));
    }
    public function siswaNonAktif()
    {
        $siswanonaktif = Siswa::where('status', 'inactive')->get();

        return view('poinAkses/owner/LaporanSiswa/siswaNonAktif', compact('siswanonaktif'));
    }
}
