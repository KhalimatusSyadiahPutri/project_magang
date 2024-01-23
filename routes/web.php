<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'danramil'],function () {

    //danramil/dashboardcontroller
    //membuat controller php artisan make:controller Folder/NamaControler
    Route::get('/',[App\Http\Controllers\Danramil\DashboardController::class,'dashboard']);

    Route::get('/anggota',[UserController::class, 'index']);
    Route::get('/anggota/create',[UserController::class, 'create']);
    Route::post('/anggota/store', [UserController::class, 'store']);
    Route::get('/anggota/{id}/edit',[UserController::class, 'edit']);
    Route::patch('/anggota/{id}/update', [UserController::class, 'update']);
    Route::delete('/anggota/{id}/delete', [UserController::class, 'delete']);
    Route::get('/anggota/export-excel', [UserController::class, 'exportExcel']);
    Route::get('/anggota/print-pdf', [UserController::class, 'printPdf']);

    Route::get('/jabatan', [JabatanController::class, 'index']);
    Route::get('/jabatan/create', [JabatanController::class, 'create']); //buka form data
    Route::post('jabatan/store',[JabatanController::class, 'store']); // simpan data
    Route::get('/jabatan/{id}/edit',[JabatanController::class, 'edit']); // buka form untuk edit
    Route::put('/jabatan/{id}/update',[JabatanController::class, 'update']); //proses update data
    Route::delete('/jabatan/{id}/delete', [JabatanController::class, 'delete']); // Menambahkan method untuk menghapus jabatan

    Route::get('/pangkat',[PangkatController::class, 'index']);
    Route::get('/pangkat/create',[PangkatController::class, 'create']); //buka form data
    Route::post('/pangkat/store',[PangkatController::class, 'store']); //simpan data
    Route::get('/pangkat/{id}/edit',[PangkatController::class, 'edit']); //buka form untuk edit
    route::put('/pangkat/{id}/update',[PangkatController::class, 'update']); //proses update data
    Route::delete('/pangkat/{id}/delete',[PangkatController::class, 'delete']); // untuk mengahapus pangkat

    Route::get('/provinsi',[ProvinsiController::class, 'index']);
    Route::get('/provinsi/create',[ProvinsiController::class, 'create']); //buka form data
    Route::post('/provinsi/store',[ProvinsiController::class, 'store']); //simpan data
    Route::get('/provinsi/{id}/edit',[ProvinsiController::class, 'edit']); //open for edit
    Route::put('/provinsi/{id}/update',[ProvinsiController::class, 'update']); //update data
    Route::delete('/provinsi/{id}/delete',[ProvinsiController::class, 'delete']); // untuk mengahapus pangkat

    Route::get('/kota',[KotaController::class, 'index']);
    Route::get('/kota/create',[KotaController::class, 'create']); //buka form data
    Route::post('/kota/store',[KotaController::class, 'store']); //simpan data
    Route::get('/kota/{id}/edit',[KotaController::class, 'edit']); //open for edit
    Route::put('/kota/{id}/update',[KotaController::class, 'update']); //update data
    Route::delete('/kota/{id}/delete',[KotaController::class, 'delete']); //delete untuk mengahapus pangkat

    Route::get('/kecamatan',[KecamatanController::class, 'index']);
    Route::get('/kecamatan/create',[KecamatanController::class, 'create']); //buka form data
    Route::post('/kecamatan/store',[KecamatanController::class, 'store']);
    Route::post('/kecamatan/{id}/edit',[KecamatanController::class, 'edit']);
    Route::get('/kecamatan/{id}/update',[KecamatanController::class, 'update']);
    Route::get('/kecamatan/{id}/delete',[KecamatanController::class, 'delete']);

    Route::get('/desa' ,[DesaController::class, 'index']);
    Route::get('/desa/create',[DesaController::class, 'create']); //buka form data
    Route::post('/desa/store',[DesaController::class, 'store']); //simpan data

    Route::get('ajax/kabupaten/{id_provinsi}', [KotaController::class, 'indexAjax']); // ambil data kabupaten
    Route::get('ajax/kecamatan/{id_kabupaten}', [KecamatanController::class, 'indexAjax']); // ambil data kabupaten

});

Route::group(['prefix' => 'babinsa'], function () {

    Route::get('/', [App\Http\Controllers\Babinsa\DashboardController::class, 'dashboard']);

    // localhost:8000/babinsa/kegiatan-masyarakat
    Route::get('/kegiatan-masyarakat', function () {
        return 'untuk menampilkan kegiatan masyarakat';
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';