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
            'foto'             => ['required', 'mimes:jpg,png,jpeg'],
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
        
        return redirect('recent-report')->with('status', 'Laporan Berhasil Terkirim!, Silahkan Tunggu Tanggapan Petugas');
    }

    public function index()
    {
        $report = Report::with('masyarakat')->where('status', null)->orderBy('created_at', 'DESC')->paginate(10);
        return view('report.report-list', ['report' => $report]);
    }

    public function declineList()
    {
        $report = Report::with('masyarakat')->where('status', '0')->orderBy('created_at', 'DESC')->paginate(10);
        return view('report.report-decline-list', ['report' => $report]);
    }

    public function detail($id)
    {
        $report = Report::where('id', $id)->get();
        return view('report.report-process-detail', ['report' => $report]);
    }

    public function verval(Request $request, $id)
    {
        if($request->input('action') == 'tolak'){
            $id = Report::findOrFail($id);
            $id->status = '0';
            $id->update();
            return redirect('report-decline-list')->with('status', 'Data Berhasil Diubah');
        }elseif($request->input('action') == 'proses'){
            $id = Report::findOrFail($id);
            $id->status = 'proses';
            $id->update();
            return redirect('report-process-list')->with('status', 'Data Berhasil Diubah');
        }elseif($request->input('action') == 'selesai'){
            $id = Report::findOrFail($id);
            $id->status = 'selesai';
            $id->update();
            return redirect('report-finished-list')->with('status', 'Data Berhasil Diubah');
        }
        
        // $validated = $request->validate([
        //     'tanggapan'      => ['required'],
        // ]);
        // $tanggapan = Report::with('tanggapan')->get('id', $id);
        // $tanggapan = Tanggapan::create([
        //     'id'                => $id,
        //     'id_pengaduan'      => Report::where('id', $id),
        //     'tgl_tanggapan'     => Carbon::now(),
        //     'tanggapan'         => $request['tanggapan'],
        //     'id_petugas'        => Auth::guard('admin')->user()->id,
        // ]);
        // $id = Report::findOrFail($id);
        // $id->status = 'proses';
        // $id->update();
        // return redirect('report-process-list')->with('status', 'Data Berhasil Diproses');
    }

    public function processList()
    {
        $report = Report::with(['masyarakat','tanggapan'])->where('status', 'proses')->orderBy('created_at', 'DESC')->paginate(10);
        return view('report.report-process-list', ['report' => $report]);
    }

    public function finishedList()
    {
        $report = Report::with(['masyarakat', 'tanggapan'])->where('status', 'selesai')->orderBy('created_at', 'DESC')->paginate(10);
        $tanggapan = Tanggapan::latest()->first(); 
        return view('report.report-finished-list', ['report' => $report, 'tanggapan' => $tanggapan]);
    }

    public function finishedDetail($id)
    {
        $report = Report::with('tanggapan')->where('id', $id)->orderBy('created_at', 'DESC')->get();
        return view('report.report-finished-detail', ['report' => $report]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggapan'      => ['required'],
        ]);
        $tanggapan = Report::with('tanggapan')->get('id', $id);
        $tanggapan = Tanggapan::create([
            'id_pengaduan'      => $id,
            'tgl_tanggapan'     => Carbon::now(),
            'tanggapan'         => $request['tanggapan'],
            'id_petugas'        => Auth::guard('admin')->user()->id,
        ]);
        return redirect('report-process-list')->with('status', 'Data Berhasil Diproses');
        // if($request['status'])
        // {
        //     $validated = $request->validate([
        //         'tanggapan'      => ['required'],
        //     ]);
        //     $tanggapan = Report::with('tanggapan')->get('id', $id);
        //     $tanggapan = Tanggapan::where('id', $id)->update([
        //         'id_pengaduan'      => $id,
        //         'tgl_tanggapan'     => Carbon::now(),
        //         'tanggapan'         => $request['tanggapan'],
        //         'id_petugas'        => Auth::guard('admin')->user()->id,
        //     ]);
        //     $report = Report::where('id',$id)->update([
        //         'status'            => $request['status'],
        //     ]);

        //     if(Report::where('status', '=', 'proses')->first()){
        //         return redirect('report-process-list')->with('status', 'Data berhasil diupdate!');
        //     }elseif(Report::where('status', '=', 'selesai')->first()){
        //         return redirect('report-finished-list')->with('status', 'Data berhasil diupdate!');
        //     }
            
        // }elseif($request->only(['tanggapan'])){
        //     $validated = $request->validate([
        //         'tanggapan'      => ['required'],
        //     ]);
        //     $tanggapan = Report::with('tanggapan')->get('id', $id);
        //     $tanggapan = Tanggapan::where('id', $id)->update([
        //         'id_pengaduan'      => $id,
        //         'tgl_tanggapan'     => Carbon::now(),
        //         'tanggapan'         => $request['tanggapan'],
        //         'id_petugas'        => Auth::guard('admin')->user()->id,
        //     ]);
        //     return redirect('report-process-list')->with('status', 'Data berhasil diupdate!');
        // }
    }

    public function recent()
    {
        $report = Report::with(['masyarakat','tanggapan'])->where('nik', (auth()->user()->nik))->orderBy('created_at', 'DESC')->paginate(10);
        return view('report.recent-report', ['report' => $report]);
    }

    public function recentDetail($id)
    {
        $report = Report::with('tanggapan')->where('id', $id)->orderBy('created_at', 'DESC')->get();
        return view('report.report-recent-detail', ['report' => $report]);
    }

    public function details($id)
    {
        $report = Report::with(['masyarakat','tanggapan'])->where('id', $id)->get();
        return view('report.report-details', ['report' => $report]);
    }

    public function delete($id)
    {
        $report = Report::where('id', $id)->first();
        return view('report.report-delete', ['report' => $report]);
    }

    public function destroy($id)
    {
        $report = Report::where('id', $id)->first();
        $report->delete();
        return redirect('report-list')->with('status', 'Data Berhasil Dihapus!');
    }

    
}
