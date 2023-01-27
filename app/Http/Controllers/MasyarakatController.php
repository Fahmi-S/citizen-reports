<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('masyarakat-list', ['masyarakat' => $masyarakat]);
    }
    
    public function add()
    {
        return view('masyarakat-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik'               => ['required', 'unique:masyarakat', 'max:13'],
            'nama'              => ['required', 'max:32'],
            'username'          => ['required', 'unique:masyarakat', 'max:25'],
            'password'          => ['required', 'min:3'],
            'telp'              => ['required'],
        ]);
        //Hashing password
        $request['password'] = Hash::make($request->password);
        $masyarakat = Masyarakat::create($request->all());
        return redirect('masyarakat-list')->with('status', 'Data Berhasil Ditambahkan!');
    }

    public function edit($slug)
    {
        $masyarakat = Masyarakat::where('slug', $slug)->first();
        return view('masyarakat-edit', ['masyarakat' => $masyarakat]);
    }

    public function update(Request $request, $slug)
    {
        $masyarakat = Masyarakat::whereSlug($slug)->first();
        $validated = $request->validate([
            'nik'               => ['required', "unique:masyarakat,nik,{$masyarakat->nik},nik", 'max:16'],
            'nama'              => ['required', 'max:32'],
            'username'          => ['required', "unique:masyarakat,username,{$masyarakat->nik},nik", 'max:25'],
            'password'          => ['required','min:3'],
            'telp'              => ['required'],
        ]);
        $request['password'] = Hash::make($request->password);
        $masyarakat->slug = null;
        $masyarakat->update($request->all());
        return redirect('masyarakat-list')->with('status', 'Data Berhasil Diubah!');
    }
    
    public function delete($slug)
    {
        $masyarakat = Masyarakat::whereSlug($slug)->first();
        return view('masyarakat-delete', ['masyarakat' => $masyarakat]);
    }

    public function destroy($slug)
    {
        $masyarakat = Masyarakat::whereSlug($slug)->first();
        $masyarakat->delete();
        return redirect('masyarakat-list')->with('status', 'Data Berhasil Dihapus!');
    }

    public function deletedMasyarakat()
    {
        $deletedMasyarakat = Masyarakat::onlyTrashed()->get();
        return view('masyarakat-deleted-list', ['deletedMasyarakat' => $deletedMasyarakat]);
    }

    public function restore($slug)
    {
        $masyarakat = Masyarakat::withTrashed()->whereSlug($slug)->first();
        $masyarakat->restore();
        return redirect('masyarakat-list')->with('status', 'Data Berhasil Dikembalikan!');
    }
}
