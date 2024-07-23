<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\orangtua;
use App\Models\Siswa;
use App\Models\SiswaKursus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $datasiswa = Siswa::with('kursus','user')->get();
        return view('poinAkses/operator/KelolaSiswa/index', compact('datasiswa'));
    }
    public function create()
    {
        $datakursus = Kursus::all();
        return view('poinAkses/operator/KelolaSiswa/create', ['kursus' => $datakursus]); //kursus->nama variabel yang akan digunakan di dalam view untuk merujuk ke data kursus yang diambil sebelumnya dengan $datakursus
    }
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'vnama'          => 'required|max:100',
            'kursus_id'      => 'required|exists:kursuses,id',
            'vjenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'vno_telp'       => 'required|numeric',
            'vemail'         => 'required|email|unique:users,email', // Ensure email is unique in users table
            'vorangtua'      => 'required|max:100',
            'vtgl'           => 'required|date',
            'valamat'        => 'required',
            'vfoto'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'emailortu'      => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Create a new User account for the Siswa
        $user           = new User;
        $user->name     = $request->vnama;
        $user->email    = $request->vemail;
        $user->password = Hash::make('123456'); // Set a default password
        $user->role     = 'siswa'; // Set role to 'siswa'

        if ($request->hasFile('vfoto')) {
            $photo = $request->file('vfoto');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'FotoUser/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($photo));
            $user->foto = $filename;
        }
        $user->save();

        $userorangtua           = new User;
        $userorangtua->name     = $request->vorangtua;
        $userorangtua->email    = $request->emailortu;
        $userorangtua->password = Hash::make('123456'); // Set a default password
        $userorangtua->role     = 'orantua'; // Set role to 'siswa'

        $userorangtua->save();

        //crete new orangtua 
        $orangtua           = new orangtua;
        $orangtua->nama     = $request->vorangtua;
        $orangtua->alamat   = $request->valamat;
        $orangtua->notelp   = $request->vno_telp;
        $orangtua->email    = $request->emailortu;
        $orangtua->user_id  = $userorangtua->id;
        $orangtua->save();
        

        // Create a new Siswa record
        $siswa              = new Siswa;
        $siswa->nama        = $request->vnama;
        $siswa->alamat      = $request->valamat;
        $siswa->tgl_lahir   = $request->vtgl;
        $siswa->jk          = $request->vjenis_kelamin;
        $siswa->no_telp     = $request->vno_telp;
        $siswa->email       = $request->vemail;
        $siswa->orangtua    = $request->vorangtua;
        $siswa->kursus_id   = $request->kursus_id;
        $siswa->user_id     = $user->id; // Associate the siswa with the user
        $siswa->orangtua_id = $orangtua->id;

        if ($request->hasFile('vfoto')) {
            $photo = $request->file('vfoto');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'fotosiswa/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($photo));
            $siswa->foto = $filename;
        }

        $siswa->save();

        // Create new SiswaKursus record
        $siswakursus = new SiswaKursus;
        $siswakursus->siswa_id = $siswa->id;
        $siswakursus->kursus_id = $request->kursus_id;
        $siswakursus->save(); 

        return redirect()->route('KelolaSiswa')->with('success', 'Data berhasil ditambahkan dan akun siswa berhasil dibuat');
    }


    public function edit($id)
    {
        $datakursus = Kursus::all();
        $datasiswa  = Siswa::findOrFail($id);
        return view('poinAkses/operator/KelolaSiswa/edit', compact('datasiswa','datakursus')); //kursus->nama variabel l yang akan digunakan di dalam view untuk merujuk ke data kursus yang diambil sebelumnya dengan $datakursus
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vnama'          => 'required|max:100',
            'kursus_id'      => 'required|exists:kursuses,id',
            'vjenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'vno_telp'       => 'required|numeric',
            'vemail'         => 'required|email',
            'vorangtua'      => 'required|max:100',
            'vtgl'           => 'required|date',
            'valamat'        => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $siswa              = Siswa::findOrFail($id);
        $siswa->nama        = $request->vnama;
        $siswa->alamat      = $request->valamat;
        $siswa->tgl_lahir   = $request->vtgl;
        $siswa->jk          = $request->vjenis_kelamin;
        $siswa->no_telp     = $request->vno_telp;
        $siswa->email       = $request->vemail;
        $siswa->orangtua    = $request->vorangtua;
        $siswa->kursus_id   = $request->kursus_id;
        $siswa->status      = $request->status;
        
            if ($request->hasFile('vfoto')) {
                $photo = $request->file('vfoto');
                $filename = date('Y-m-d') . $photo->getClientOriginalName();
                $path = 'fotosiswa/' . $filename;

                Storage::disk('public')->put($path, file_get_contents($photo));
                $siswa['foto'] = $filename;
            }

        $siswa->save();
        return redirect()->route('KelolaSiswa')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $datasiswa = Siswa::find($id);
        if($datasiswa)
        {
            Storage::delete('public/fotosiswa/' . $datasiswa->foto);
            $datasiswa->delete();
        }

        return redirect()->route('KelolaSiswa')->with('success', 'Data berhasil dihapus');
    }
}
