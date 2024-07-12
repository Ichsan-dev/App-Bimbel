<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $datareview = Review::get();
        return view('poinAkses/admin/KelolaWebsite/Review/index', compact('datareview'));
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'vnama'      => 'required',
            'vkomentar'   => 'required',
            'vthumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah menjadi validasi gambar
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'nama'      => $request->vnama,
            'komentar'  => $request->vkomentar,
        ];

        // Upload gambar
        if ($request->hasFile('vthumbnail')) {
            $photo = $request->file('vthumbnail');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'review/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($photo));
            $data['gambar'] = $filename;
        }

        Review::create($data);

        return redirect()->route('ReviewWebsite')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vnama'        => 'required',
            'vkomentar'  => 'required',
            'vthumbnail'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah menjadi validasi gambar
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $review = Review::findOrFail($id);

        $data = [
            'nama'     => $request->vnama,
            'komentar' => $request->vkomentar,
        ];

        // Upload gambar baru jika ada
        if ($request->hasFile('vthumbnail')) {
            $photo = $request->file('vthumbnail');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'review/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($photo));
            $data['gambar'] = $filename;
        }

        $review->update($data);
        return redirect()->route('ReviewWebsite')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $data = Review::find($id);

        if($data){
            // Hapus file terkait dari folder penyimpanan
            Storage::delete('public/review/' . $data->gambar);

            // Hapus data dari database
            $data->delete();
        }

        return redirect()->route('ReviewWebsite')->with('success', 'Data berhasil dihapus');
        
    }
}
