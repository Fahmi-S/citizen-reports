<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Masyarakat;

class ProfileController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::find(auth()->user());
        $petugas = Petugas::find(auth()->user());
        return view('profile', ['petugas' => $petugas, 'masyarakat' => $masyarakat]);
    }

    public function edit()
    {
        $masyarakat = Masyarakat::find(auth()->user());
        $petugas = Petugas::find(auth()->user());
        return view('profile-edit', ['petugas' => $petugas, 'masyarakat' => $masyarakat]);
    }

    public function update(Request $request)
    {
        if(Auth::guard('admin')->user()){
            if ($request->file('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
                $request->file('image')->storeAs('profile/petugas', $newName);
                $request['foto'] = $newName;
            }

            $petugas = Petugas::find(auth()->user()->id);
            $validated = $request->validate([
                'nama_petugas'      => ['max:35'],
                'telp'              => ['max:13'],
            ]);
            $petugas->update($request->only('nama_petugas', 'telp', 'foto'));
            return redirect('profile')->with('status', 'Data berhasil diupdate!');

        }

        if(Auth::guard('masyarakat')->user()){
            if ($request->file('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
                $request->file('image')->storeAs('profile/masyarakat', $newName);
                $request['foto'] = $newName;
            }

            $masyarakat = Masyarakat::find(auth()->user()->nik);
            $validated = $request->validate([
                'nama'              => ['max:35'],
                'telp'              => ['max:13'],
            ]);
            $masyarakat->update($request->only('nama', 'telp', 'foto'));
            return redirect('profile')->with('status', 'Data berhasil diupdate!');
        }
        
    }
}
