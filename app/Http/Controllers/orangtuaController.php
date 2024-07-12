<?php

namespace App\Http\Controllers;

use App\Models\KemajuanSiswa;
use App\Models\orangtua;
use App\Models\PembayaranSpp;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class orangtuaController extends Controller
{
    public function spp()
    {
        $user       = Auth::user();
        $user_id    = $user->id;

        $orangtua       = orangtua::where('user_id', '=', $user_id)->get();
        $orangtua_id    = $orangtua[0]->id;

        $siswa      = Siswa::where('orangtua_id', '=', $orangtua_id)->get();
        $siswa_id   = $siswa[0]->id;

        $CekSpp     = PembayaranSpp::where('siswa_id', '=', $siswa_id)->get();
        return view('poinAkses/orangtua/CekSpp/index', compact('CekSpp'));
    }
    public function KemajuanSiswa()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $orangtua = orangtua::where('user_id', '=', $user_id)->get();
        $orangtua_id = $orangtua[0]->id;

        $siswa = Siswa::where('orangtua_id', '=', $orangtua_id)->get();
        $siswa_id = $siswa[0]->id;

        $CekKemajuanSiswa = KemajuanSiswa::where('siswa_id', '=', $siswa_id)->get();
        return view('poinAkses/orangtua/CekKemajuanSiswa/index', compact('CekKemajuanSiswa'));

    }
       public function ResetPassword()
    {
        return view('poinAkses/orangtua/ResetPassword/index');
    }
    public function UpdatePassword(Request $request)
    {
          $user = Auth::user();

            // Validasi data formulir
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            // Cek apakah kata sandi saat ini cocok
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Kata sandi saat ini tidak cocok.');
            }

            // Perbarui kata sandi
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('status', 'Kata sandi berhasil diperbarui.');
    }
}

