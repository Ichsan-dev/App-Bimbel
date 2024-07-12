<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KursusController extends Controller
{
    public function index()
    {
        $datakursus     = Kursus::all();
        $dataInstruktur = Instruktur::all();
        return view('poinAkses/operator/KelolaKursus/index', compact('datakursus', 'dataInstruktur'));
        
    }
    public function store(Request $request)
{

        $validator = Validator::make($request->all(),[
            'vnama'         => 'required',
            'vharga'        => 'required',
            'vdeskripsi'    => 'required',
            'instruktur_id' => 'required'
        ]);

        // Periksa apakah validasi gagal
        if ($validator->fails()) {
            // Jika validasi gagal, kembalikan kembali dengan pesan kesalahan validasi
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Jika validasi berhasil, lanjutkan dengan menyimpan data kursus
        $data = new Kursus;
        $data->nama_kursus      = $request->vnama;
        $data->harga            = $request->vharga;
        $data->deskripsi        = $request->vdeskripsi;
        $data->instruktur_id    = $request->instruktur_id;
        $data->save();

        // Setelah data disimpan, kembalikan view dengan data instruktur
        return redirect()->route('KelolaKursus')->with('success', 'Data Berhasil Ditambahkan');
}

    public function update(Request $request, $id)
    {
          $validator = Validator::make($request->all(),[
            'vnama'         => 'required',
            'vharga'        => 'required',
            'vdeskripsi'    => 'required',
            'instruktur_id' => 'required'
        ]);

        // Periksa apakah validasi gagal
        if ($validator->fails()) {
            // Jika validasi gagal, kembalikan kembali dengan pesan kesalahan validasi
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Jika validasi berhasil, lanjutkan dengan menyimpan data kursus
        $data = Kursus::findOrFail($id);
        $data->nama_kursus      = $request->vnama;
        $data->harga            = $request->vharga;
        $data->deskripsi        = $request->vdeskripsi;
        $data->instruktur_id    = $request->instruktur_id;
        $data->update();

        return redirect()->route('KelolaKursus')->with('success', 'Data Berhasil diperbarui');
    }
    public function destroy($id)
    {
        $kursus = Kursus::find($id);

        if($kursus)
        {
            $kursus->delete();
        }

        return redirect()->route('KelolaKursus')->with('success', 'Data Berhasil Ditambahkan');
    }
}
