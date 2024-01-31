<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BencanaAlamController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'babinsa', 'as' => 'babinsa.', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\Babinsa\DashboardController::class, 'dashboard']);
    Route::resource('absensi', AbsensiController::class);
    Route::resource('bencana-alam', BencanaAlamController::class);
    Route::resource('kegiatan', KegiatanController::class);
});