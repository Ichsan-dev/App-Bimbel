<?php

namespace App\Http\Controllers;

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
            'kursus_siswa'  =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

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
