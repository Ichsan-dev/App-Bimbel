<?php

namespace App\Http\Controllers;

use App\Models\AbsensiKaryawan;
use App\Models\karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiKaryawanController extends Controller
{
    public function index()
    {
        $datakaryawan           = karyawan::all();
        $absensikaryawan    = AbsensiKaryawan::all();
        return view('poinAkses/operator/AbsensiKaryawan/index', compact('datakaryawan', 'absensikaryawan'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'nama_karyawan' => 'required',
            'tanggal'       => 'required',
            'jam_masuk'     => 'required',
            'jam_keluar'    => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $absensikaryawan                = new AbsensiKaryawan;
        $absensikaryawan->karyawan_id   = $request->nama_karyawan;
        $absensikaryawan->tanggal       = $request->tanggal;
        $absensikaryawan->jam_masuk     = $request->jam_masuk;
        $absensikaryawan->jam_keluar    = $request->jam_keluar;
        $absensikaryawan->keterangan    = $request->keterangan;
        $absensikaryawan->save();

        return redirect()->route('AbsensiKaryawan')->with('success', 'Data Absensi Berhasil Ditambahkan!');
    }
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
            
            'nama_karyawan' => 'required',
            'tanggal'       => 'required',
            'jam_masuk'     => 'required',
            'jam_keluar'    => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $absensikaryawan                = AbsensiKaryawan::findOrFail($id);
        $absensikaryawan->karyawan_id   = $request->nama_karyawan;
        $absensikaryawan->tanggal       = $request->tanggal;
        $absensikaryawan->jam_masuk     = $request->jam_masuk;
        $absensikaryawan->jam_keluar    = $request->jam_keluar;
        $absensikaryawan->keterangan    = $request->keterangan;
        $absensikaryawan->save();

        return redirect()->route('AbsensiKaryawan')->with('success', 'Data Absensi Berhasil Diperbarui');
    }
    public function destroy($id)
    {
        $absensikaryawan = AbsensiKaryawan::find($id);

        if($absensikaryawan)
        {
            $absensikaryawan->delete();
        }
        return redirect()->route('AbsensiKaryawan')->with('success', 'Data Berhasil Dihapus');
    }
}
