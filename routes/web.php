<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    //Masyarakat
    Route::get('masyarakat-list', [MasyarakatController::class, 'index']);
    Route::get('masyarakat-add', [MasyarakatController::class, 'add']);
    Route::post('masyarakat-add', [MasyarakatController::class, 'store']);
    Route::get('masyarakat-edit/{slug}', [MasyarakatController::class, 'edit']);
    Route::put('masyarakat-edit/{slug}', [MasyarakatController::class, 'update']);
    Route::get('masyarakat-delete/{slug}', [MasyarakatController::class, 'delete']);
    Route::get('masyarakat-destroy/{slug}', [MasyarakatController::class, 'destroy']);
    Route::get('masyarakat-deleted', [MasyarakatController::class, 'deletedMasyarakat']);
    Route::get('masyarakat-restore/{slug}', [MasyarakatController::class, 'restore']);
    //Report
    Route::get('report-list', [ReportController::class, 'index']);
    Route::get('report-process/{id}', [ReportController::class, 'detail']);
    Route::put('report-process/{id}', [ReportController::class, 'process']);
    Route::get('report-process-list', [ReportController::class, 'processList']);
});

Route::middleware(['auth:admin,masyarakat'])->group(function () {
    
    //profile
    Route::get('profile', [ProfileController::class, 'index']);
    //Logout
    Route::get('logout', [AuthController::class, 'logout']);
    //Report
    Route::get('report-add', [ReportController::class, 'add']);
    Route::post('report-add', [ReportController::class, 'store']);
});


