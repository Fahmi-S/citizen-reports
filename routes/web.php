<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

//Login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authenticating']);

//Dashboard
Route::get('dashboard', [DashboardController::class, 'index']);

