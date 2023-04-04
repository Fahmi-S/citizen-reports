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
        $petugas = Petugas::where('level', 'petugas')->paginate(10);
        return view('petugas.petugas-list', ['petugas' => $petugas]);
    }
    
    public function add()
    {
        $petugas = Petugas::all();
        return view('petugas.petugas-add',['petugas' => $petugas]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_petugas'      => ['required'],
            'username'          => ['required', 'unique:petugas', 'unique:masyarakat', 'max:20'],
            'image'             => ['mimes:jpg,png,jpeg'],
            'password'          => ['required'],
            'telp'              => ['required'],
            'level'             => ['required'],
        ]);

        $newName = '';

        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('profile/petugas', $newName);
        }

        // //proccess adding and encrypting password
        $request['foto'] = $newName;
        $request['password'] = Hash::make($request->password);
        $petugas = Petugas::create($request->all());
        return redirect('petugas-list')->with('status', 'Data Petugas Berhasil Ditambahkan!');
    }

    public function edit($slug)
    {
        $petugas = Petugas::where('slug', $slug)->first();
        return view('petugas.petugas-edit', ['petugas' => $petugas]);
    }

    public function update(Request $request, $slug)
    {   
        $petugas = Petugas::whereSlug($slug)->first();
        $validated = $request->validate([
            'nama_petugas'      => ['required'],
            'username'          => ['required', 'max:20', "unique:petugas,username,{$petugas->id}", 'unique:masyarakat'],
            'image'             => ['mimes:jpg,png,jpeg'],
            // 'password'          => ['required'],
            'telp'              => ['required'],
            'level'             => ['required'],
        ]);

        if ($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('profile/petugas', $newName);
            $request['foto'] = $newName;
        }
        if($request->password){
            $request['password'] = Hash::make($request->password);
        } else {
            $request['password'] = $petugas->password;
        }
        
        $petugas->slug = null;
        $petugas->update($request->all());
        return redirect('petugas-list')->with('status', 'Data Petugas Berhasil Diubah!');
    }

    public function delete($slug)
    {
        $petugas = Petugas::where('slug', $slug)->first();
        return view('petugas.petugas-delete', ['petugas' => $petugas]);
    }

    public function destroy($slug)
    {
        $petugas = Petugas::where('slug', $slug)->first();
        $petugas->delete();
        return redirect('petugas-list')->with('status', 'Data Petugas Berhasil Dihapus!');
    }

    public function deletedPetugas()
    {
        $deletedPetugas = Petugas::onlyTrashed()->paginate(10);
        return view('petugas.petugas-deleted-list', ['deletedPetugas' => $deletedPetugas]);
    }

    public function restore($slug)
    {
        $petugas = Petugas::withTrashed()->where('slug', $slug)->first();
        $petugas->restore();
        return redirect('petugas-list')->with('status', 'Data Petugas Berhasil DiKembalikan!');
    }
}
