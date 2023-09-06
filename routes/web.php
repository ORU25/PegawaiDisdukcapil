<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPendidikan;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/{nip}', [DtailPegawaiController::class, 'index'])->name('dtail');
    Route::put('/pegawai/{id}', [DtailPegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/{nip}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');

    Route::get('/pegawai/{nip}/pendidikan',[PendidikanController::class, 'index'])->name('pendidikan');
    Route::post('/pegawai/{nip}/pendidikan/store', [PendidikanController::class, 'store'])->name('pendidikan.store');
    Route::put('/pegawai/pendidikan/{id}', [PendidikanController::class, 'update'])->name('pendidikan.update');
    Route::delete('/pegawai/pendidikan/{id}', [PendidikanController::class, 'destroy'])->name('pendidikan.delete');
    
    Route::get('/pegawai/{id}/diklat',[DiklatController::class, 'index'])->name('diklat');
    Route::post('/pegawai/{id}/diklat/store', [DiklatController::class, 'store'])->name('diklat.store');
    Route::put('/pegawai/diklat/{id}', [DiklatController::class, 'update'])->name('diklat.update');
    Route::delete('/pegawai/diklat/{id}', [DiklatController::class, 'destroy'])->name('diklat.delete');

    Route::post('/pegawai/keluarga/{id}', [KeluargaController::class, 'store'])->name('keluarga.store');
    Route::put('/pegawai/keluarga/{id}', [KeluargaController::class, 'update'])->name('keluarga.update');
    Route::delete('/pegawai/keluarga/{id}', [KeluargaController::class, 'destroy'])->name('keluarga.delete');

    Route::post('/pegawai/kenaikanGaji/store/{id}', [GajiController::class, 'store'])->name('gaji.store');
    Route::put('/pegawai/kenaikanGaji/{id}', [GajiController::class, 'update'])->name('gaji.update');
    Route::delete('/pegawai/kenaikanGaji/{id}', [GajiController::class, 'destroy'])->name('gaji.delete');
    Route::post('/pegawai/kenaikanPangkat/store/{id}', [kenaikanPangkatController::class, 'store'])->name('pangkat.store');
    Route::put('/pegawai/kenaikanPangkat/{id}', [kenaikanPangkatController::class, 'update'])->name('pangkat.update');
    Route::delete('/pegawai/kenaikanPangkat/{id}', [kenaikanPangkatController::class, 'destroy'])->name('pangkat.delete');

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');
    Route::post('/jabatan/store', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::put('/jabatan//update/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.delete');
});

require __DIR__.'/auth.php';
