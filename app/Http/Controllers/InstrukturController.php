<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstrukturController extends Controller
{
       public function index()
       {
            $dataInstruktur = Instruktur::get();
            return view('poinAkses/operator/KelolaInstruktur/index', compact('dataInstruktur'));
       }
       public function store(Request $request)
       {
            $validator = Validator::make($request->all(), [
                'vnama'     => 'required',
                'vemail'    => 'required',
                'vno_telp'  => 'required',
            ]);

            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $dataInstruktur = [
                'nama_instruktur' => $request->vnama,
                'email'           => $request->vemail,
                'no_telp'        => $request->vno_telp
            ];

            Instruktur::create($dataInstruktur);
            return redirect()->route('KelolaInstruktur')->with('success', 'Data berhasil ditambahkan');

       }
       public function update(Request $request, $id)
       {
            $validator = Validator::make($request->all(), [
                'vnama'     => 'required',
                'vemail'    => 'required',
                'vno_telp'  => 'required',
            ]);

            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $dataInstruktur = [
                'nama_instruktur' => $request->vnama,
                'email'           => $request->vemail,
                'no_telp'        => $request->vno_telp
            ];

            Instruktur::findOrFail($id)->update($dataInstruktur);
            return redirect()->route('KelolaInstruktur')->with('success', 'Data berhasil diperbarui');
       }
       public function destroy(Request $request, $id)
       {
            $dataInstruktur = Instruktur::find($id);

            if($dataInstruktur){
                $dataInstruktur->delete();
            }
            return redirect()->route('KelolaInstruktur')->with('success', 'Data Berhasil Dihapus');
       }
   
}
