<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi'
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            } elseif (Auth::user()->role == 'operator'){
                return redirect('operator');
            } elseif (Auth::user()->role == 'owner'){
                return redirect('owner');
            }elseif (Auth::user()->role == 'guru'){
                return redirect('guru');
            }elseif (Auth::user()->role == 'orantua'){
                return redirect('orangtua');
            }elseif (Auth::user()->role == 'siswa'){
                return redirect('siswa');
            }elseif (Auth::user()->role == 'calonsiswa'){
                return redirect('calonsiswa');
            }
        }else{

            return redirect('login')->with('gagal', 'Email atau Password Salah')->withInput();
        }
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'fullname'      => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6'
        ]);

        $data['name']       = $request->fullname;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        return redirect()->route('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Keluar');
    }
}
