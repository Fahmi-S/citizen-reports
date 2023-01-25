<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
});


//Dashboard
Route::get('dashboard', [DashboardController::class, 'index']);

//Logout
Route::get('logout', [AuthController::class, 'logout']);

//profile
Route::get('profile', [ProfileController::class, 'index']);

//Account Crud
Route::get('petugas-list', [PetugasController::class, 'index']);
Route::get('petugas-add', [PetugasController::class, 'add']);
Route::post('petugas-add', [PetugasController::class, 'store']);
Route::get('petugas-edit/{slug}', [PetugasController::class, 'edit']);
Route::put('petugas-edit/{slug}', [PetugasController::class, 'update']);
Route::get('petugas-delete/{slug}', [PetugasController::class, 'delete']);
Route::get('petugas-destroy/{slug}', [PetugasController::class, 'destroy']);
Route::get('petugas-deleted', [PetugasController::class, 'deletedPetugas']);
Route::get('petugas-restore/{slug}', [PetugasController::class, 'restore']);


