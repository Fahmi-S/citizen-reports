<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah Petugas
        $petugasCount = Petugas::count();
        // Menghitung jumlah Masyarakat
        $masyarakatCount = Masyarakat::count();
        // Menghitung jumlah Petugas + jumlah Masyarakat
        $totaluser = $petugasCount + $masyarakatCount;
        // Menghitung jumlah Pengaduan yang sedang proses
        $processreportCount  = Report::where('status', 'proses')->count();
        // Menghitung jumlah pengaduan yang sudah selesai
        $finishedreportCount = Report::where('status', 'selesai')->count();
        // Menghitung jumlah seluruh pengaduan
        $allreportCount = Report::count();
        // Memasukan variable kedalam blade
        return view('dashboard', ['total_user' => $totaluser, 'processreport_count' => $processreportCount, 'allreport_count' => $allreportCount, 'finishedreport_count' => $finishedreportCount]);
    }
}
