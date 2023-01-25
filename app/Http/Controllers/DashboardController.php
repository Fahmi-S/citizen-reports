<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugasCount = Petugas::count();
        return view('dashboard', ['petugas_count' => $petugasCount]);
    }
}
