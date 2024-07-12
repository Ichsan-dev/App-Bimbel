<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiSiswaController extends Controller
{
    public function index()
    {
        $datasiswa      = Siswa::all();
        $dataAbsensi    = AbsensiSiswa::all();
        return view('poinAkses/operator/KelolaAbsensi/index', compact('datasiswa', 'dataAbsensi'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_siswa'    => 'required',
            'tanggal'       => 'required',
            'status'        => 'required'
        ]);

        if($validator->fails()){       
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $dataAbsensi = [
            'siswa_id'      => $request->nama_siswa,
            'tanggal'       => $request->tanggal,
            'keterangan'    => $request->status,
            'catatan'       => $request->catatan
        ];

        AbsensiSiswa::create($dataAbsensi);
        return redirect()->route('KelolaAbsensi')->with('success', 'Data Berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {   
        
        $validator = Validator::make($request->all(),[
            'nama_siswa'    => 'required',
            'tanggal'       => 'required',
            'status'        => 'required'
        ]);

        if($validator->fails()){       
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $dataAbsensi = [
            'siswa_id'      => $request->nama_siswa,
            'tanggal'       => $request->tanggal,
            'keterangan'    => $request->status,
            'catatan'       => $request->catatan
        ];

        AbsensiSiswa::findOrFail($id)->update($dataAbsensi);
        return redirect()->route('KelolaAbsensi')->with('success', 'Data Berhasil diperbarui');
    }
    public function destroy($id)
    {
        $dataAbsensi = AbsensiSiswa::find($id);

        if($dataAbsensi){
            $dataAbsensi->delete();
        }
        return redirect()->route('KelolaAbsensi')->with('success', 'Data Berhasil dihapus');
    }
}
