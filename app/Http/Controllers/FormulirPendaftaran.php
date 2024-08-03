<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\orangtua;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\SiswaKursus;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;

class FormulirPendaftaran extends Controller
{
      public function formulir()
    {
        $datakursus = Kursus::all();
        return view('poinAkses/calonsiswa/formulir' , compact('datakursus'));
    }
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'vnama'          => 'required|max:100',
            'kursus_id'      => 'required|exists:kursuses,id',
            'vno_telp'       => 'required|max:15',
            'vemail'         => 'required|email|unique:pendaftarans,email',
            'vorangtua'      => 'required|max:100',
            'emailortu'      => 'required|email|unique:pendaftarans,emailortu',
            'vtgl'           => 'required|date',
            'valamat'        => 'required',
            'vjenis_kelamin' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Simpan data pendaftaran
        $pendaftaran = new Pendaftaran;
        $pendaftaran->id_pendaftaran = Pendaftaran::generateIdPendaftaran(); // Generate ID pendaftaran otomatis
        $pendaftaran->nama           = $request->vnama;
        $pendaftaran->kursus_id      = $request->kursus_id;
        $pendaftaran->no_telp        = $request->vno_telp;
        $pendaftaran->email          = $request->vemail;
        $pendaftaran->orangtua       = $request->vorangtua;
        $pendaftaran->emailortu      = $request->emailortu;
        $pendaftaran->tgl_lahir      = $request->vtgl;
        $pendaftaran->alamat         = $request->valamat;
        $pendaftaran->jk             = $request->vjenis_kelamin;

        $pendaftaran->save();

        // Muat ulang pendaftaran dengan relasi kursus
        $pendaftaran = Pendaftaran::with('kursus')->find($pendaftaran->id);

        // Generate PDF
        $pdf = Pdf::loadView('pdf.formulir-pendaftaran', ['datapendaftaran' => $pendaftaran]);
        return $pdf->stream('formulir-pendaftaran.pdf');
    }

    public function index(Request $request)
    {
        $datapendaftaran    = Pendaftaran::query();
        if ($request->get('search')){
            $datapendaftaran->where('id_pendaftaran', 'LIKE', '%' . $request->get('search') . '%')
            ->orWhere('nama', 'LIKE', '%' . $request->get('search') . '%');
        }

        $datapendaftaran = $datapendaftaran->get();

        return view('poinAkses/admin/KelolaPendaftaran/index' , compact('datapendaftaran', 'request'));
    }

    public function edit($id)
    {
        $datakursus = Kursus::all();
        $datapendaftaran = Pendaftaran::findOrFail($id);
        return view('poinAkses/admin/KelolaPendaftaran/edit' , compact('datakursus', 'datapendaftaran'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
       'idpendaftaran'   => 'required',
        'vnama'          => 'required|max:100',
        'kursus_id'      => 'required|exists:kursuses,id',
        'vno_telp'       => 'required|max:15',
        'vemail'         => 'required|email',
        'vorangtua'      => 'required|max:100',
        'emailortu'      => 'required|email',
        'vtgl'           => 'required|date',
        'valamat'        => 'required',
        'vjenis_kelamin' => 'required'

       ]);

       if($validator->fails()){
           return redirect()->back()->withInput()->withErrors($validator);
       }

       $data = [
       'id_pendaftaran'     => $request->idpendaftaran,
       'nama'               => $request->vnama,
       'kursus_id'          => $request->kursus_id,
       'no_telp'            => $request->vno_telp,
       'email'              => $request->vemail,
       'orangtua'           => $request->vorangtua,
       'emailortu'          => $request->emailortu,
       'tgl_lahir'          => $request->vtgl,
       'alamat'             => $request->valamat,
       'jk'                 => $request->vjenis_kelamin,
       
    ];

    Pendaftaran::findOrFail($id)->update($data);
    return redirect()->route('KelolaPendaftaran')->with('success', 'Data Pendaftaran Berhasil Di perbarui');

    }

    public function destroy($id)
    {
        $data = Pendaftaran::find($id);

        if($data)
        {
            $data->delete();
        }
        return redirect()->route('KelolaPendaftaran')->with('success', 'Data Pendaftaran Berhasil Di Hapus');
    }

    public function upload(Request $request, $id)
    {
        $calonsiswa = Pendaftaran::findOrFail($id);
        $kursus     = Kursus::findOrFail($calonsiswa->kursus_id);

        // Check if user email already exists
        $existingUser = User::where('email', $calonsiswa->email)->first();
        if ($existingUser) {
            return redirect()->route('KelolaPendaftaran')->with('error', 'Siswa sudah terdaftar.');
        }

        $existingOrangtua = User::where('email', $calonsiswa->emailortu)->first();
        if ($existingOrangtua) {
            return redirect()->route('KelolaPendaftaran')->with('error', 'Email orang tua sudah terdaftar.');
        }

        // Create a new User account for the Siswa
        $user           = new User;
        $user->name     = $calonsiswa->nama;
        $user->email    = $calonsiswa->email;
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
        $userorangtua->name     = $calonsiswa->orangtua;
        $userorangtua->email    = $calonsiswa->emailortu;
        $userorangtua->password = Hash::make('123456'); // Set a default password
        $userorangtua->role     = 'orantua'; // Set role to 'siswa'
        $userorangtua->save();

        //crete new orangtua 
        $orangtua           = new orangtua;
        $orangtua->nama     = $calonsiswa->orangtua;
        $orangtua->alamat   = $calonsiswa->alamat;
        $orangtua->notelp   = $calonsiswa->no_telp;
        $orangtua->email    = $calonsiswa->emailortu;
        $orangtua->user_id  = $userorangtua->id;
        $orangtua->save();

        $siswa              = new Siswa;
        $siswa->nama        = $calonsiswa->nama;
        $siswa->kursus_id   = $kursus->id;
        $siswa->no_telp     = $calonsiswa->no_telp;
        $siswa->email       = $calonsiswa->email;
        $siswa->orangtua    = $calonsiswa->orangtua;
        $siswa->tgl_lahir   = $calonsiswa->tgl_lahir;
        $siswa->alamat      = $calonsiswa->alamat;
        $siswa->jk          = $calonsiswa->jk;
        $siswa->user_id     = $user->id; // Associate the siswa with the user
        $siswa->orangtua_id = $orangtua->id;
        $siswa->save();

        $siswakursus = new SiswaKursus;
        $siswakursus->siswa_id = $siswa->id;
        $siswakursus->kursus_id = $kursus->id;
        $siswakursus->save(); 
        return redirect()->route('KelolaPendaftaran')->with('success', 'Data Pendaftaran Berhasil Di Upload');
    }

     public function getNextId()
    {
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $latestPendaftaran = Pendaftaran::orderBy('id', 'desc')->first();

        if ($latestPendaftaran) {
            $lastId = (int)substr($latestPendaftaran->id_pendaftaran, -3);
            $nextIdNumber = str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextIdNumber = '001';
        }

        $nextId = 'P' . $year . $month . $nextIdNumber;

        return response()->json(['nextId' => $nextId]);
    }

}
