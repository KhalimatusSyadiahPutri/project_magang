<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahPenugasanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\BencanaAlamController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\SuratKeluarController;

Route::group(['prefix' => 'danramil', 'as' => 'danramil.', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\Danramil\DashboardController::class, 'dashboard']);
    Route::resource('absensi', AbsensiController::class);

    Route::resource('anggota', UserController::class);
    Route::resource('wilayah-penugasan', WilayahPenugasanController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('surat-masuk', SuratMasukController::class);
    Route::resource('surat_keluar', SuratKeluarLetterController::class);

    // babinsa
    Route::resource('bencana-alam', BencanaAlamController::class);
    Route::resource('kegiatan', KegiatanController::class);
});