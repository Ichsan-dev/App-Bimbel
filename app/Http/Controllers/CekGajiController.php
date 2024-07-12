<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekGajiController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        $karyawan = $user->karyawan;

        // Pastikan siswa tidak null
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Karyawan tidak ditemukan untuk pengguna ini.');
        }
        
        // Mengambil jadwal yang sesuai dengan siswa_id dari user yang sedang login
        $cekgaji = GajiKaryawan::where('karyawan_id', $karyawan->id)->get();
        
        return view('poinAkses/guru/Gaji/index', compact('cekgaji'));
    }

    private function terbilang($number) 
    {
        $number = abs($number);
        $words = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $result = "";
        if ($number < 12) {
            $result = " " . $words[$number];
        } elseif ($number < 20) {
            $result = $this->terbilang($number - 10) . " belas";
        } elseif ($number < 100) {
            $result = $this->terbilang($number / 10) . " puluh" . $this->terbilang($number % 10);
        } elseif ($number < 200) {
            $result = " seratus" . $this->terbilang($number - 100);
        } elseif ($number < 1000) {
            $result = $this->terbilang($number / 100) . " ratus" . $this->terbilang($number % 100);
        } elseif ($number < 2000) {
            $result = " seribu" . $this->terbilang($number - 1000);
        } elseif ($number < 1000000) {
            $result = $this->terbilang($number / 1000) . " ribu" . $this->terbilang($number % 1000);
        } elseif ($number < 1000000000) {
            $result = $this->terbilang($number / 1000000) . " juta" . $this->terbilang($number % 1000000);
        }
        return trim($result);
    }

    public function cetak()
    {
        $user = Auth::user();
        $karyawan = $user->karyawan;

        // Pastikan karyawan tidak null
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Karyawan tidak ditemukan untuk pengguna ini.');
        }

        // Mengambil data gaji yang sesuai dengan karyawan_id dari user yang sedang login
        $cekgaji = GajiKaryawan::where('karyawan_id', $karyawan->id)->get();

        // Menghitung total gaji
        $total_gaji = $cekgaji->sum('total_gaji');
        $terbilang_gaji = $this->terbilang($total_gaji) . ' rupiah';

        // Memuat tampilan PDF dengan data gaji karyawan
        $pdf = Pdf::loadView('pdf.Cetak-Gaji', compact('karyawan', 'cekgaji', 'terbilang_gaji'));
        $pdf->setPaper('A4', 'portrait');

        // Mengembalikan stream PDF dengan header konten yang benar
        return response($pdf->stream('Cetak-Gaji.pdf'), 200)
            ->header('Content-Type', 'application/pdf');
    }
}

