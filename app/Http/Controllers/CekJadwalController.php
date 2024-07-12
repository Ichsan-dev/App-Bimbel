<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use App\Models\JadwalSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CekJadwalController extends Controller
{
 public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        $siswa = $user->siswa;

        // Pastikan siswa tidak null
        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan untuk pengguna ini.');
        }
        
        // Mengambil jadwal yang sesuai dengan siswa_id dari user yang sedang login
        $cekjadwal = JadwalSiswa::where('siswa_id', $siswa->id)->get();
        
        return view('poinAkses/siswa/Jadwal/index', compact('cekjadwal'));
    }
    public function absen()
    {
        $user   = Auth::user();
        $siswa  = $user->siswa;

        if (!$siswa)
        {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan untuk pengguna ini.');
        }

        $cekabsen = AbsensiSiswa::where('siswa_id', $siswa->id)->get();

        return view('poinAkses/siswa/Absen/index', compact('cekabsen'));
    }
        public function resetpass()
    {
        $user = Auth::user();
        return view('poinAkses/siswa/ResetPassword/index', compact('user'));
    }
    public function updatepass(Request $request)
    {
    
        $user = Auth::user();

            // Validasi data formulir
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            // Cek apakah kata sandi saat ini cocok
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Kata sandi saat ini tidak cocok.');
            }

            // Perbarui kata sandi
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('status', 'Kata sandi berhasil diperbarui.');

    }
}
