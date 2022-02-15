<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataObatController;
use App\Http\Controllers\DataObatPasienController;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\DataTindakanController;
use App\Http\Controllers\DataTindakanPasienController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\DataWilayahController;
use App\Http\Controllers\InfoTagihanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth', 'cekLevel:master,admin,user'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::middleware(['auth', 'cekLevel:master'])->group(function () {
    Route::resource('data-pegawai', DataPegawaiController::class);
    Route::resource('data-user', DataUserController::class)->except('show');
    Route::resource('data-wilayah', DataWilayahController::class)->except('show');
    Route::resource('data-tindakan', DataTindakanController::class)->except('show');
    Route::resource('data-obat', DataObatController::class)->except('show');
    Route::resource('data-pasien', DataPasienController::class)->except('show');

    Route::get('data-tindakan-pasien/create/{data_tindakan_pasien}', [DataTindakanPasienController::class, 'create']);
    Route::post('data-tindakan-pasien/create/{data_tindakan_pasien}', [DataTindakanPasienController::class, 'store']);
    Route::delete('data-tindakan-pasien/{data_tindakan_pasien}/{idxarray}', [DataTindakanPasienController::class, 'destroy']);
    Route::resource('data-tindakan-pasien', DataTindakanPasienController::class)->except('create', 'store', 'destroy');

    Route::get('data-obat-pasien/create/{data_tindakan_pasien}', [DataObatPasienController::class, 'create']);
    Route::post('data-obat-pasien/create/{data_tindakan_pasien}', [DataObatPasienController::class, 'store']);
    Route::delete('data-obat-pasien/{data_tindakan_pasien}/{idxarray}', [DataObatPasienController::class, 'destroy']);
    Route::resource('data-obat-pasien', DataObatPasienController::class)->except('create', 'store', 'destroy');

    Route::get('/info-tagihan', [InfoTagihanController::class, 'index']);
    Route::get('/laporan', [LaporanController::class, 'index']);
});

Route::middleware(['auth', 'cekLevel:master,admin'])->group(function () {
    Route::resource('data-pegawai', DataPegawaiController::class);
    Route::resource('data-tindakan', DataTindakanController::class)->except('show');
    Route::resource('data-obat', DataObatController::class)->except('show');
    Route::resource('data-pasien', DataPasienController::class)->except('show');
    Route::get('/info-tagihan', [InfoTagihanController::class, 'index']);
    Route::get('/laporan', [LaporanController::class, 'index']);
});

Route::middleware(['auth', 'cekLevel:master,user'])->group(function () {
    Route::get('data-tindakan-pasien/create/{data_tindakan_pasien}', [DataTindakanPasienController::class, 'create']);
    Route::post('data-tindakan-pasien/create/{data_tindakan_pasien}', [DataTindakanPasienController::class, 'store']);
    Route::delete('data-tindakan-pasien/{data_tindakan_pasien}/{idxarray}', [DataTindakanPasienController::class, 'destroy']);
    Route::resource('data-tindakan-pasien', DataTindakanPasienController::class)->except('create', 'store', 'destroy');

    Route::get('data-obat-pasien/create/{data_tindakan_pasien}', [DataObatPasienController::class, 'create']);
    Route::post('data-obat-pasien/create/{data_tindakan_pasien}', [DataObatPasienController::class, 'store']);
    Route::delete('data-obat-pasien/{data_tindakan_pasien}/{idxarray}', [DataObatPasienController::class, 'destroy']);
    Route::resource('data-obat-pasien', DataObatPasienController::class)->except('create', 'store', 'destroy');
});
