<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\JadwalSiswa;
use App\Models\Siswa;
use App\Models\Kursus;
use App\Models\SiswaKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaKursusController extends Controller
{
    public function index()
    {
        $datakursus      = Kursus::all();
        $datasiswakursus = SiswaKursus::all();
        $datasiswa       = Siswa::all();
        return view('poinAkses/operator/KelolaSiswaKursus/index', compact('datakursus', 'datasiswakursus', 'datasiswa'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_siswa'    => 'required',
            'kursus_siswa'  =>  'required',
            'hari'          => 'required|array',
            'jam_mulai'     => 'required',
            'jam_selesai'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Gabungkan nilai checkbox menjadi satu string
        $hari = implode(', ', $request->input('hari'));
        
        // Ambil kursus yang dipilih
        $kursus = Kursus::findOrFail($request->kursus_siswa);

        // Ambil instruktur terkait dari kursus
        $instruktur_id = $kursus->instruktur_id;
        
        // Buat jadwal baru
        $jadwal = new JadwalSiswa;
        $jadwal->siswa_id = $request->nama_siswa;
        $jadwal->kursus_id = $request->kursus_siswa;
        $jadwal->instruktur_id = $instruktur_id;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->hari = $hari;
        $jadwal->save();

        // Buat data siswa kursus baru
        $datasiswakursus = [
            'siswa_id'  => $request->nama_siswa,
            'kursus_id' => $request->kursus_siswa
        ];

        SiswaKursus::create($datasiswakursus);
        return redirect()->route('KelolaSiswaKursus')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama_siswa'    => 'required',
            'kursus_siswa'  =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $datasiswakursus = [
            'siswa_id'  => $request->nama_siswa,
            'kursus_id' => $request->kursus_siswa
        ];

        SiswaKursus::find($id)->update($datasiswakursus);
        return redirect()->route('KelolaSiswaKursus')->with('success', 'Data berhasil ditambahkan');
        
    }
    public function destroy($id)
    {
        $datasiswakursus = SiswaKursus::find($id);

            if($datasiswakursus){
                $datasiswakursus->delete();
            }
        return redirect()->route('KelolaSiswaKursus')->with('success', 'Data Berhasil Dihapus');
    }
}
