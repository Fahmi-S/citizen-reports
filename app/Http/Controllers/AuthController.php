<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if(Auth::guard('admin')->attempt($credentials)){
            if (Auth::guard('admin')->user()->level == 'admin'){
                return redirect('dashboard');
            }else if(Auth::guard('admin')->user()->level == 'petugas') {
                dd('halaman petugas');
            }else if(Auth::guard('admin')->user()->level == 'masyarakat'){
                dd('halaman masyarakat');
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
}
