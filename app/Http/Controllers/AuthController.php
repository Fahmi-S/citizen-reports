<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        // Awal pengecekan terjadi pada table masyarakat
        // Jika session berasal dari table masyarakat maka sintaks dibawah ini dijalankan
        if(Auth::guard('masyarakat')->attempt($credentials)){
            return redirect('home');
        }

        //Jika session berasal dari table admin maka sintaks dibawah ini dijalankan
        if(Auth::guard('admin')->attempt($credentials)){
            if (Auth::guard('admin')->user()->level == 'admin'){
                return redirect('dashboard');
            }else if(Auth::guard('admin')->user()->level == 'petugas') {
                return redirect('home');
            }
        }
                
        // Jika credentials/data tidak sesuai dengan yang ada di table munculkan error dan lempar kembali ke login
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Gagal / Tidak Ditemukan Data');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'nik'           => ['required','unique:masyarakat','max:13'],
            'nama'          => ['required','max:32'],
            'username'      => ['required','unique:masyarakat', 'unique:petugas','max:25'],
            'password'      => ['required','min:3'],
            'telp'          => ['required'],
        ]);
        //Hashing password
        $request['password'] = Hash::make($request->password);
        $masyarakat = Masyarakat::create($request->only('nik', 'nama', 'username', 'password', 'telp'));
        Session::flash('status', 'success');
        Session::flash('message', 'Registrasi Berhasil Dilakukan!');
        return redirect('login');
    }
}
