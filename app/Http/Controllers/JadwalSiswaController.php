<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\JadwalSiswa;
use App\Models\Kursus;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalSiswaController extends Controller
{
    public function index()
    {
            return view('poinAkses/operator/KelolaJadwal/index', [
            'datajadwal'        => JadwalSiswa::all(),
            'datasiswa'         => Siswa::all(),
            'datakursus'        => Kursus::all(),
            'dataInstruktur'    => Instruktur::all()
        ]);

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required',
            'hari' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $siswa      = Siswa::findOrFail($request->nama_siswa);
        $kursus     = Kursus::findOrFail($siswa->kursus_id);
        $instruktur = Instruktur::findOrFail($kursus->instruktur_id);

        $nama_kursus = $kursus->nama_kursus;
        $instruktur = $instruktur->nama_instruktur;

        // Gabungkan nilai checkbox menjadi satu string
        $hari = implode(', ', $request->input('hari'));

        $datajadwal = [
            'siswa_id' => $request->nama_siswa,
            'namakursus' => $nama_kursus,
            'namainstruktur' => $instruktur,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'hari' => $hari
        ];

        JadwalSiswa::create($datajadwal);
        return redirect()->route('KelolaJadwal')->with('success', 'Data Jadwal Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {

         $validator = Validator::make($request->all(),[
            'nama_siswa'        => 'required',
            'hari'              => 'required|array'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

             // Gabungkan nilai checkbox menjadi satu string
        $hari = implode(', ', $request->input('hari'));

        $datajadwal = [
            'siswa_id'      => $request->nama_siswa,
            'jam_mulai'     => $request->jam_mulai,
            'jam_selesai'     => $request->jam_selesai,
            'hari'          => $hari 
        ];

        JadwalSiswa::findOrFail($id)->update($datajadwal);
        return redirect()->route('KelolaJadwal')->with('success', 'Data Jadwal Berhasil Diperbarui');
    }
    public function destroy($id)
    {
        $datajadwal = JadwalSiswa::find($id);

        if($datajadwal){
            $datajadwal->delete();
        }

        return redirect()->route('KelolaJadwal')->with('success', 'Data Berhasil Dihapus');
    }
}
