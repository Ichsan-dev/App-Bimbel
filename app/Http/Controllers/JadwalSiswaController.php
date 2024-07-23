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
    public function store (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_siswa'        => 'required',
            'kursus_siswa'      => 'required',
            'nama_instruktur'   => 'required',
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
            'kursus_id'     => $request->kursus_siswa,
            'instruktur_id' => $request->nama_instruktur,
            'jam_mulai'     => $request->jam_mulai,
            'jam_selesai'     => $request->jam_selesai,
            'hari'          => $hari 
        ];

        JadwalSiswa::create($datajadwal);
        return redirect()->route('KelolaJadwal')->with('success', 'Data Jadwal Berhasil Ditambahkan');
    }
    public function update(Request $request, $id)
    {

         $validator = Validator::make($request->all(),[
            'nama_siswa'        => 'required',
            'kursus_siswa'      => 'required',
            'nama_instruktur'   => 'required',
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
            'kursus_id'     => $request->kursus_siswa,
            'instruktur_id' => $request->nama_instruktur,
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
