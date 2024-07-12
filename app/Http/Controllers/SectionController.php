<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function index()
    {
        $datasection = Section::get();
        return view('poinAkses/admin/KelolaWebsite/Section/index', compact('datasection'));
    }

    public function create()
    {
        return view('poinAkses/admin/KelolaWebsite/Section/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vtitle'        => 'required',
            'vcontent'      => 'required',
            'vthumbnail'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah menjadi validasi gambar
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'title'   => $request->vtitle,
            'content' => $request->vcontent,
        ];

        // Upload gambar
        if ($request->hasFile('vthumbnail')) {
            $photo = $request->file('vthumbnail');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'photo-user/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($photo));
            $data['thumbnail'] = $filename;
        }

        Section::create($data);

        return redirect()->route('SectionWebsite')->with('success', 'Data Berhasil disimpan.');
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('poinAkses/admin/KelolaWebsite/Section/edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vtitle'        => 'required',
            'vcontent'      => 'required',
            'vthumbnail'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah menjadi validasi gambar
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $section = Section::findOrFail($id);

        $data = [
            'title'   => $request->vtitle,
            'content' => $request->vcontent,
        ];

        // Upload gambar baru jika ada
        if ($request->hasFile('vthumbnail')) {
            $photo = $request->file('vthumbnail');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'photo-user/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($photo));
            $data['thumbnail'] = $filename;

            // Hapus gambar lama jika ada
            // if ($section->thumbnail) {
            //     Storage::delete('public/photo-user/' . $section->thumbnail);
            // }
        }

        $section->update($data);

        return redirect()->route('SectionWebsite')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = section::find($id);

        if($data){
            // Hapus file terkait dari folder penyimpanan
            Storage::delete('public/photo-user/' . $data->thumbnail);

            // Hapus data dari database
            $data->delete();
        }

        return redirect()->route('SectionWebsite')->with('success', 'Data berhasil dihapus');
        
    }
}
