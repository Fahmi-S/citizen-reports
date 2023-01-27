<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function add()
    {
        return view('report-add');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'isi_laporan'      => ['required'],
            'foto'             => ['required'],
        ]);

        $report = Report::create([
            'tgl_pengaduan'     => Carbon::now(),
            'nik'               => Auth::guard('masyarakat')->user()->nik,
            'isi_laporan'       => $request['isi_laporan'],
            'foto'              => $request['foto'],
        ]);
        return redirect('profile')->with('status', 'Laporan Berhasil Terkirim!, Silahkan Tunggu Tanggapan Petugas');
    }
}
