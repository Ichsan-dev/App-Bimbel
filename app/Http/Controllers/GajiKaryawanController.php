<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use App\Models\karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GajiKaryawanController extends Controller
{
    public function index()
    {
        $datakaryawan           = karyawan::all();
        $dataGajiKaryawan       = GajiKaryawan::all();
        return view('poinAkses/operator/PembayaranGaji/index', compact('datakaryawan', 'dataGajiKaryawan'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_karyawan' => 'required',
            'tanggal'       => 'required|date',
            'bulan'         => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $karyawan   = karyawan::findOrFail($request->nama_karyawan);
        $jabatan    = Jabatan::findOrFail($karyawan->jabatan_id);
       
        $gaji_pokok = $jabatan->gaji;
        $tunjangan_transport = $jabatan->tunjangan_transport;
        $tunjangan_makan = $jabatan->tunjangan_makan;

        $total_gaji = $gaji_pokok + $tunjangan_transport + $tunjangan_makan;

        $datagaji                       = new GajiKaryawan;
        $datagaji->karyawan_id          = $request->nama_karyawan;
        $datagaji->tanggal              = $request->tanggal;
        $datagaji->bulan                = $request->bulan;
        $datagaji->gaji_pokok           = $gaji_pokok;
        $datagaji->tunjangan_makan      = $tunjangan_makan;
        $datagaji->tunjangan_transport  = $tunjangan_transport;
        $datagaji->total_gaji           = $total_gaji;

        $datagaji->save();
        return redirect()->route('KelolaGaji')->with('success', 'Gaji karyawan berhasil disimpan.');
    }
    public function delete($id)
    {
        $dataGajikaryawan = GajiKaryawan::find($id);

        if ($dataGajikaryawan)
        {
            $dataGajikaryawan->delete();
        }

        return redirect()->route('KelolaGaji')->with('success', 'Data Berhasil dihapus.');
    }

}
