<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugasCount = Petugas::count();
        $processreportCount  = Report::where('status', 'proses')->count();
        $finishedreportCount = Report::where('status', 'selesai')->count();
        $allreportCount = Report::count();
        return view('dashboard', ['petugas_count' => $petugasCount, 'processreport_count' => $processreportCount, 'allreport_count' => $allreportCount, 'finishedreport_count' => $finishedreportCount]);
    }
}
