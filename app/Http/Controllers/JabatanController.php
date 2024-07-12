<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function index()
    {
        $dataJabatan = Jabatan::get();
        return view('poinAkses/operator/KelolaJabatan/index', compact('dataJabatan'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'vjabatan'              => 'required',
            'vgaji'                 => 'required',
            'tunjanganmakan'        => 'required',
            'tunjangantransport'    => 'required',
            'vdeskripsi'            => 'required'
        ]);

        if($validator->fails()) 
        return redirect()->back()->withInput()->withErrors($validator);

        $data['nama_jabatan']            = $request->vjabatan;
        $data['gaji']                    = $request->vgaji;
        $data['tunjangan_makan']         = $request->tunjanganmakan;
        $data['tunjangan_transport']     = $request->tunjangantransport;
        $data['deskripsi']               = $request->vdeskripsi;

        Jabatan::create($data);

        return redirect()->route('KelolaJabatan')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id); // Pastikan menggunakan findOrFail() agar menampilkan error jika data tidak ditemukan
        return view('poinAkses/operator/KelolaJabatan/edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vjabatan'              => 'required',
            'vgaji'                 => 'required|numeric', // Pastikan gaji merupakan angka
            'tunjanganmakan'        => 'required',
            'tunjangantransport'    => 'required',
            'vdeskripsi'            => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->nama_jabatan          = $request->vjabatan;
            $jabatan->gaji                  = $request->vgaji;
            $jabatan->tunjangan_makan       = $request->tunjanganmakan;
            $jabatan->tunjangan_transport   = $request->tunjangantransport;
            $jabatan->deskripsi             = $request->vdeskripsi;
            $jabatan->save();
            
            return redirect()->route('KelolaJabatan')->with('success', 'Data berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->route('KelolaJabatan')->with('error', 'Gagal memperbarui data');
        }
    }

    public function destroy(Request $request, $id)
    {
        $jabatan = Jabatan::find($id);

        if($jabatan){
            $jabatan->delete();
        }

        return redirect()->route('KelolaJabatan')->with('success', 'Data berhasil dihapus');
    }
}
