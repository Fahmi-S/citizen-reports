<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Report;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function finishedList()
    {
        $report = Report::with('tanggapan')->where('status', '=', 'selesai')->get();
        return view('report.pdf.report-finished-pdf', ['report' => $report]);
    }

    public function createFinishedPDF()
    {
        $report = Report::with('tanggapan')->where('status', '=', 'selesai')->get();
        view()->share('report', $report);
        $pdf = PDF::loadView('report.pdf.report-finished-pdf',['report' =>$report]);
        return $pdf->stream("pdf_file.pdf", array("Attachment" => false));
    }

    public function processList()
    {
        $report = Report::with('tanggapan')->where('status', '=', 'proses')->get();
        return view('report.pdf.report-process-pdf', ['report' => $report]);
    }

    public function createProcessPDF()
    {
        $report = Report::with('tanggapan')->where('status', '=', 'proses')->get();
        view()->share('report', $report);
        $pdf = PDF::loadView('report.pdf.report-process-pdf',['report' =>$report]);
        return $pdf->stream("pdf_file.pdf", array("Attachment" => false));
    }

    public function declineList()
    {
        $report = Report::with('tanggapan')->where('status', '=', '0')->get();
        return view('report..pdf.report-decline-pdf', ['report' => $report]);
    }

    public function createDeclinePDF()
    {
        $report = Report::with('tanggapan')->where('status', '=', '0')->get();
        view()->share('report', $report);
        $pdf = PDF::loadView('report.pdf.report-process-pdf',['report' =>$report]);
        return $pdf->stream("pdf_file.pdf", array("Attachment" => false));
    }
}
