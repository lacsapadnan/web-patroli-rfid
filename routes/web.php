<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatroliController;
use App\Http\Controllers\ScanController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', [HomeController::class, 'index'])->name('dashboard');


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/laporan', [PatroliController::class, 'index'])->name('laporan');

    //patroli
    Route::get('/patroli', [PatroliController::class, 'patroli'])->name('patroli');
    Route::post('/mulai-patroli', [PatroliController::class, 'mulaiPatroli'])->name('mulai-patroli');
    Route::post('/selesai-patroli', [PatroliController::class, 'selesaiPatroli'])->name('selesai-patroli');

    // scan
    Route::get('/scan', [ScanController::class, 'index'])->name('scan');

    // Route::get('/data-karyawan', [UserController::class, 'index'])->name('dataKaryawan');
    Route::resource('data-karyawan', UserController::class);
});
