<?php

namespace App\Http\Controllers;

use App\Models\Jumbotron;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JumbotronController extends Controller
{
    public function index()
    {
        $datajumbotron = Jumbotron::get();
        return view('poinAkses/admin/KelolaWebsite/Jumbotron/index', compact('datajumbotron'));
    }
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
            'vtitle'        => 'required',
            'vdescription'  => 'required',
            'vthumbnail'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah menjadi validasi gambar
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $jumbotron = Jumbotron::findOrFail($id);

        $data = [
            'title'       => $request->vtitle,
            'description' => $request->vdescription,
        ];

        // Upload gambar baru jika ada
        if ($request->hasFile('vthumbnail')) {
            $gambar = $request->file('vthumbnail');
            $filename = date('Y-m-d') . $gambar->getClientOriginalName();
            $path = 'jumbotron/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($gambar));
            $data['image'] = $filename;
        }

        $jumbotron->update($data);
        

        return redirect()->route('JumbotronWebsite')->with('success', 'Data Berhasil dirubah');
    }

}
