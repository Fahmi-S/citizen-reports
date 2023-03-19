<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasyarakatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['only_guest'])->group(function () {
    //Login Controllers
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);

    Route::get('/register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware(['auth:admin,masyarakat', 'only_admin'])->group(function () {
    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);
    //Petugas Crud
    Route::get('petugas-list', [PetugasController::class, 'index']);
    Route::get('petugas-add', [PetugasController::class, 'add']);
    Route::post('petugas-add', [PetugasController::class, 'store']);
    Route::get('petugas-edit/{slug}', [PetugasController::class, 'edit']);
    Route::put('petugas-edit/{slug}', [PetugasController::class, 'update']);
    Route::get('petugas-delete/{slug}', [PetugasController::class, 'delete']);
    Route::get('petugas-destroy/{slug}', [PetugasController::class, 'destroy']);
    Route::get('petugas-deleted', [PetugasController::class, 'deletedPetugas']);
    Route::get('petugas-restore/{slug}', [PetugasController::class, 'restore']);
    //Masyarakat Crud
    Route::get('masyarakat-list', [MasyarakatController::class, 'index']);
    Route::get('masyarakat-add', [MasyarakatController::class, 'add']);
    Route::post('masyarakat-add', [MasyarakatController::class, 'store']);
    Route::get('masyarakat-edit/{slug}', [MasyarakatController::class, 'edit']);
    Route::put('masyarakat-edit/{slug}', [MasyarakatController::class, 'update']);
    Route::get('masyarakat-delete/{slug}', [MasyarakatController::class, 'delete']);
    Route::get('masyarakat-destroy/{slug}', [MasyarakatController::class, 'destroy']);
    Route::get('masyarakat-deleted', [MasyarakatController::class, 'deletedMasyarakat']);
    Route::get('masyarakat-restore/{slug}', [MasyarakatController::class, 'restore']);
    //Report PDF
    Route::get('pdf-finished', [PdfController::class, 'finishedList']);
    Route::get('report-finished-pdf', [PdfController::class, 'createFinishedPDF']);
    Route::get('pdf-process', [PdfController::class, 'processList']);
    Route::get('report-process-pdf', [PdfController::class, 'createProcessPDF']);
    Route::get('pdf-decline', [PdfController::class, 'declineList']);
    Route::get('report-decline-pdf', [PdfController::class, 'createDeclinePDF']);
    Route::get('pdf-list', [PdfController::class, 'list']);
    Route::get('report-pdf', [PdfController::class, 'createList']);
    Route::get('report-all', [PdfController::class, 'allList']);

});

Route::middleware(['auth:admin,masyarakat', 'petugasadmin'])->group(function () {
    //Report Status Null / Belum diverval
    Route::get('report-list', [ReportController::class, 'index']);
    //Report Status "0" / Ditolak
    Route::get('report-decline-list', [ReportController::class, 'declineList']);

    //Report Status "proses"
    Route::get('report-detail/{id}', [ReportController::class, 'detail']);
    Route::put('report-process/{id}', [ReportController::class, 'verval']);
    Route::get('report-process-list', [ReportController::class, 'processList']);

    //Report Status "Selesai"
    Route::get('report-finished-detail/{id}', [ReportController::class, 'finishedDetail']);
    Route::post('report-finished-detail/{id}', [ReportController::class, 'update']);
    Route::get('report-finished-list', [ReportController::class, 'finishedList']);

    //Report detail
    Route::get('report-details/{id}', [ReportController::class, 'details']);

    //Report delete
    Route::get('report-delete/{id}', [ReportController::class, 'delete']);
    Route::get('report-destroy/{id}', [ReportController::class, 'destroy']);
});

Route::middleware(['auth:admin,masyarakat'])->group(function () {
    
    Route::get('/', function () {
    return view('welcome');
    });
    //Profile
    Route::get('profile', [ProfileController::class, 'index']);
    Route::get('profile-edit', [ProfileController::class, 'edit']);
    Route::put('profile-edit', [ProfileController::class, 'update']);
    //Logout
    Route::get('logout', [AuthController::class, 'logout']);
    //Report
    Route::get('report-add', [ReportController::class, 'add'])->middleware('only_masyarakat');
    Route::post('report-add', [ReportController::class, 'store'])->middleware('only_masyarakat');
    Route::get('recent-report', [ReportController::class, 'recent'])->middleware('only_masyarakat');
    Route::get('report-recent-detail/{id}', [ReportController::class, 'recentDetail']);
    //Home
    Route::get('home', [HomeController::class, 'index']);
});


