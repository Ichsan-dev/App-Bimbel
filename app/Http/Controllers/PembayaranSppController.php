<?php

namespace App\Http\Controllers;

use App\Models\PembayaranSpp;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PembayaranSppController extends Controller
{
    public function index()
    {
        $dataSPP = PembayaranSpp::with('siswa')->get();
        $datasiswa = Siswa::all();

        return view('poinAkses/operator/pembayaranspp/index', compact('dataSPP', 'datasiswa'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'nama_siswa'    => 'required',
            'tanggal'       => 'required',
            'bulan'         => 'required',
            'status'        => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $SPP                        = new PembayaranSpp;
        $SPP->siswa_id              = $request->nama_siswa;
        $SPP->tanggal_pembayaran    = $request->tanggal;
        $SPP->bulan_pembayaran      = $request->bulan;
        $SPP->status_pembayaran     = $request->status;
        $SPP->keterangan            = $request->keterangan;
        $SPP->save();

        return redirect()->route('KelolaSPP')->with('success', 'Data Pembayaran SPP Berhasil Ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[

            'nama_siswa'    => 'required',
            'tanggal'       => 'required',
            'bulan'         => 'required',
            'status'        => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $SPP                        = PembayaranSpp::findOrFail($id);
        $SPP->siswa_id              = $request->nama_siswa;
        $SPP->tanggal_pembayaran    = $request->tanggal;
        $SPP->bulan_pembayaran      = $request->bulan;
        $SPP->status_pembayaran     = $request->status;
        $SPP->keterangan            = $request->keterangan;
        $SPP->save();

        return redirect()->route('KelolaSPP')->with('success', 'Data Pembayaran SPP Berhasil Diperbarui');
    }
    public function destroy($id)
    {
        $dataSPP = PembayaranSpp::find($id);

        if($dataSPP){
            $dataSPP->delete();
        }
        return redirect()->route('KelolaSPP')->with('success', 'Data Berhasil DiHapus');
    }
}
