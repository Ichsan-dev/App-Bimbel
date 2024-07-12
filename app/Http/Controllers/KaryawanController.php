<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $datakaryawan = karyawan::all();
        return view('poinAkses/operator/KelolaKaryawan/index', compact('datakaryawan'));
    }
    public function destroy($id)
    {
        $karyawan = karyawan::find($id);

        // Periksa apakah data karyawan ditemukan
        if ($karyawan) {
            // Jika ditemukan, hapus data karyawan
            $karyawan->delete();
            
            // Berikan respons sukses
            return redirect()->route('KelolaKaryawan')->with('success', 'Data karyawan berhasil dihapus.');
        } else {
            // Jika data karyawan tidak ditemukan, berikan respons error
            return redirect()->route('KelolaKaryawan')->with('error', 'Data karyawan tidak ditemukan.');
        }
    }
    public function create()
    {
        $jabatan = Jabatan::all(); // Ambil semua data jabatan dari model Jabatan
        return view('poinAkses/operator/KelolaKaryawan/create', ['jabatan' => $jabatan]); // Kirim data jabatan ke view
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'vnama'          => 'required|max:100',
        'jabatan_id'     => 'required|exists:jabatans,id',
        'vjenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'vno_telp'       => 'required|numeric',
        'vemail'         => 'required|email',
        'vpend_akhir'    => 'required',
        'vtgl'           => 'required|date',
        'valamat'        => 'required',
        ]);

        if($validator->fails()) {     
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Create a new User account for the Siswa
        $user = new User;
        $user->name = $request->vnama;
        $user->email = $request->vemail;
        $user->password = Hash::make('123456'); // Set a default password
        $user->role = 'guru'; // Set role to 'siswa'
        $user->save();

        $karyawan = new karyawan;
        $karyawan->nama = $request->vnama;
        $karyawan->alamat = $request->valamat;
        $karyawan->tanggal_lahir = $request->vtgl;
        $karyawan->jk = $request->vjenis_kelamin;
        $karyawan->no_telp = $request->vno_telp;
        $karyawan->email = $request->vemail;
        $karyawan->pend_akhir = $request->vpend_akhir;
        $karyawan->jabatan_id = $request->jabatan_id; // Simpan id jabatan yang dipilih
        $karyawan->user_id = $user->id; // Associate the siswa with the user
        $karyawan->save();

        return redirect()->route('KelolaKaryawan')->with('success', 'Data karyawan berhasil ditambahkan dan akun berhasil dibuat');
    }
    public function edit($id)
    {
        $jabatan      = Jabatan::all();
        $datakaryawan = karyawan::findOrFail($id);
        return view('poinAkses/operator/KelolaKaryawan/edit', compact('datakaryawan','jabatan'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'vnama'          => 'required|max:100',
            'jabatan_id'     => 'required|exists:jabatans,id',
            'vjenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'vno_telp'       => 'required|numeric',
            'vemail'         => 'required|email',
            'vpend_akhir'    => 'required',
            'vtgl'           => 'required|date',
            'valamat'        => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'nama'          => $request->vnama,
            'jabatan_id'    => $request->jabatan_id,
            'jk'            => $request->vjenis_kelamin,
            'no_telp'       => $request->vno_telp,
            'email'         => $request->vemail,
            'pend_akhir'    => $request->vpend_akhir,
            'tanggal_lahir' => $request->vtgl,
            'alamat'        => $request->valamat
        ];

        karyawan::findOrFail($id)->update($data);
        return redirect()->route('KelolaKaryawan')->with('success', 'Data berhasil diperbarui.');

    }
}
