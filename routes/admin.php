<?php

use App\Http\Controllers\WilayahPenugasanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KecabanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\BencanaAlamController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::get('/', [DashboardController::class, 'admin']);
    Route::resource('absensi', AbsensiController::class);

    Route::group(['prefix' => 'lokasi', 'as' => 'location.'], function () {
        Route::get('/', [LokasiController::class, 'index'])->name('index');
        Route::get('ajax', [LokasiController::class, 'ajax'])->name('ajax');
    });

    Route::resource('pangkat', PangkatController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('anggota', UserController::class);

    Route::resource('percabangan', PercabanganController::class);
    Route::resource('bencana-alam', BencanaAlamController::class);
    Route::resource('wilayah-penugasan', WilayahPenugasanController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('surat-masuk', SuratMasukController::class);
    Route::resource('surat-keluar', SuratKeluarController::class);
});