<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        //filtering hanya petugas yang diambil datanya
        $petugas = Petugas::where('level', 'petugas')->get();
        return view('petugas-list', ['petugas' => $petugas]);
    }
    
    public function add()
    {
        $petugas = Petugas::all();
        return view('petugas-add',['petugas' => $petugas]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas|max:20',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);
        // //proccess adding and encrypting password
        $request['password'] = Hash::make($request->password);
        $petugas = Petugas::create($request->all());
        return redirect('petugas-list')->with('status', 'Data Berhasil Ditambahkan!');
    }
}
