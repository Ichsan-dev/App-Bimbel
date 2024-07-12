<?php

namespace App\Http\Controllers;

use App\Models\KemajuanSiswa;
use App\Models\Kursus;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KemajuanSiswaController extends Controller
{
    public function index()
    {
        $datakemajuansiswa = KemajuanSiswa::all();
        $datasiswa         = Siswa::all();  
        return view('poinAkses/guru/KelolaKemajuanSiswa/index', compact('datakemajuansiswa', 'datasiswa'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_siswa'    => 'required|', // Validasi bahwa siswa ada di tabel siswas
            'tanggal'       => 'required|date', // Validasi bahwa tanggal adalah format tanggal yang valid
            'nilai'         => 'required', // Validasi bahwa nilai adalah angka
            'keterangan'    => 'required' // Validasi bahwa keterangan adalah string
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Temukan siswa berdasarkan ID
        $siswa = Siswa::with('kursus')->findOrFail($request->nama_siswa);
        $kursus = $siswa->kursus;

        // Ambil nama kursus dari relationship
        $namaKursus = $kursus->nama_kursus;

        // Buat entri kemajuan siswa baru
        $datakemajuansiswa = new KemajuanSiswa;
        $datakemajuansiswa->siswa_id = $request->nama_siswa;
        $datakemajuansiswa->tanggal = $request->tanggal;
        $datakemajuansiswa->nilai = $request->nilai;
        $datakemajuansiswa->keterangan = $request->keterangan;
        $datakemajuansiswa->kursus = $namaKursus;

        // Simpan entri ke database
        $datakemajuansiswa->save();

        // Kembalikan ke halaman KelolaKemajuanSiswa dengan pesan sukses
        return redirect()->route('KelolaKemajuanSiswa')->with('success', 'Data Berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
            'nama_siswa'    => 'required|', // Validasi bahwa siswa ada di tabel siswas
            'tanggal'       => 'required|date', // Validasi bahwa tanggal adalah format tanggal yang valid
            'nilai'         => 'required', // Validasi bahwa nilai adalah angka
            'keterangan'    => 'required' // Validasi bahwa keterangan adalah string
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [

            'siswa_id'      => $request->nama_siswa,
            'tanggal'       => $request->tanggal,
            'nilai'         => $request->nilai,
            'keterangan'    => $request->keterangan

        ];

        KemajuanSiswa::findOrFail($id)->update($data);
        return redirect()->route('KelolaKemajuanSiswa')->with('success', 'Data Berhasil diperbarui');
    }

    public function delete($id)
    {
        $datakemajuansiswa = KemajuanSiswa::find($id);

        if($datakemajuansiswa)
        {
            $datakemajuansiswa->delete();
        }
        return redirect()->route('KelolaKemajuanSiswa')->with('success', 'Data Berhasil dihapus.');
    }
}
