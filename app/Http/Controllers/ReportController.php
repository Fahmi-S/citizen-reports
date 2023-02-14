<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function add()
    {
        return view('report.report-add');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'isi_laporan'      => ['required'],
            'foto'             => ['required'],
        ]);

        if($request->file('foto')){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->isi_laporan.'-'.now()->timestamp.'.'.$extension;
            $request->file('foto')->storeAs('foto', $newName);
        }

        $report = Report::create([
            'tgl_pengaduan'     => Carbon::now(),
            'nik'               => Auth::guard('masyarakat')->user()->nik,
            'isi_laporan'       => $request['isi_laporan'],
            'foto'              => $request['foto'] = $newName,
        ]);
        
        return redirect('profile')->with('status', 'Laporan Berhasil Terkirim!, Silahkan Tunggu Tanggapan Petugas');
    }

    public function index()
    {
        $report = Report::with('masyarakat')->where('status', '0')->orderBy('created_at', 'DESC')->get();
        return view('report.report-list', ['report' => $report]);
    }

    public function detail($id)
    {
        $report = Report::where('id', $id)->get();
        return view('report.report-process-detail', ['report' => $report]);
    }

    public function process(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggapan'      => ['required'],
        ]);
        $tanggapan = Report::with('tanggapan')->get('id', $id);
        $tanggapan = Tanggapan::create([
            'id'                => $id,
            'id_pengaduan'      => $id,
            'tgl_tanggapan'     => Carbon::now(),
            'tanggapan'         => $request['tanggapan'],
            'id_petugas'        => Auth::guard('admin')->user()->id,
        ]);
        $id = Report::findOrFail($id);
        $id->status = 'proses';
        $id->update();
        return redirect('report-process-list')->with('status', 'Data Berhasil Diproses');
    }

    public function processList()
    {
        $report = Report::with(['masyarakat','tanggapan'])->where('status', 'proses')->orderBy('created_at', 'DESC')->get();
        return view('report.report-process-list', ['report' => $report]);
    }

    public function finishedList()
    {
        $report = Report::with(['masyarakat', 'tanggapan'])->where('status', 'selesai')->orderBy('updated_at', 'DESC')->get(); 
        return view('report.report-finished-list', ['report' => $report]);
    }

    public function finishedDetail($id)
    {
        $report = Report::with('tanggapan')->where('id', $id)->get();
        return view('report.report-finished-detail', ['report' => $report]);
    }

    public function finished(Request $request, $id)
    {
        $tanggapan = Report::with('tanggapan')->get('id', $id);
        $tanggapan = Tanggapan::where('id', $id)->update([
            'id_pengaduan'      => $id,
            'tgl_tanggapan'     => Carbon::now(),
            'tanggapan'         => $request['tanggapan'],
            'id_petugas'        => Auth::guard('admin')->user()->id,
        ]);
        $id = Report::findOrFail($id);
        $id->status = 'selesai';
        $id->update();
        return redirect('report-finished-list')->with('status', 'Data berhasil diupdate!');
    }

    public function recent()
    {
        return view('report.report-recent');
    }

    public function details($id)
    {
        $report = Report::with('tanggapan')->where('id', $id)->get();
        $masyarakat = Report::with('masyarakat')->where('id', $id)->get();
        return view('report.report-details', ['report' => $report, 'masyarakat' => $masyarakat]);
    }
}
