<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('mampu', App\Http\Controllers\MampuController::class);

    Route::get('pekerja/print', [App\Http\Controllers\PekerjaController::class, 'print'])->name('pekerja.print');
    Route::resource('pekerja', App\Http\Controllers\PekerjaController::class);

    Route::get('keuangan', [App\Http\Controllers\KeuanganController::class, 'index'])->name('keuangan.index');

    Route::get('tpu/print', [App\Http\Controllers\TpuController::class, 'print'])->name('tpu.print');
    Route::resource('tpu', App\Http\Controllers\TpuController::class);

    Route::get('makam/print', [App\Http\Controllers\MakamController::class, 'print'])->name('makam.print');
    Route::resource('makam', App\Http\Controllers\MakamController::class);

    Route::get('jenazah-kenal/laporan', [App\Http\Controllers\JenazahKenalController::class, 'laporan'])->name('jenazah-kenal.laporan');
    Route::resource('jenazah-kenal', App\Http\Controllers\JenazahKenalController::class);

    Route::get('jenazah/laporan', [App\Http\Controllers\JenazahController::class, 'laporan'])->name('jenazah.laporan');
    Route::resource('jenazah', App\Http\Controllers\JenazahController::class);


    Route::get('pewaris/laporan', [App\Http\Controllers\PewarisController::class, 'laporan'])->name('pewaris.laporan');
    Route::resource('pewaris', App\Http\Controllers\PewarisController::class)->parameters([
        'pewaris' => 'pewaris',
    ]);

    Route::get('pesanan/print', [App\Http\Controllers\PesananController::class, 'print'])->name('pesanan.print');
    Route::resource('pesanan', App\Http\Controllers\PesananController::class);

    Route::get('tumpangan/print', [App\Http\Controllers\TumpanganController::class, 'print'])->name('tumpangan.print');
    Route::resource('tumpangan', App\Http\Controllers\TumpanganController::class);

    Route::get('pembayaran/print', [App\Http\Controllers\PembayaranController::class, 'print'])->name('pembayaran.print');
    Route::resource('pembayaran', App\Http\Controllers\PembayaranController::class);

    Route::get('pengeluaran/print', [App\Http\Controllers\PengeluaranController::class, 'print'])->name('pengeluaran.print');
    Route::resource('pengeluaran', App\Http\Controllers\PengeluaranController::class);

    Route::get('fasilitas/print', [App\Http\Controllers\FasilitasController::class, 'print'])->name('fasilitas.print');
    Route::resource('fasilitas', App\Http\Controllers\FasilitasController::class)->parameters([
        'fasilitas' => 'fasilitas',
    ]);

    Route::get('pemeliharaan/print', [App\Http\Controllers\PemeliharaanController::class, 'print'])->name('pemeliharaan.print');
    Route::resource('pemeliharaan', App\Http\Controllers\PemeliharaanController::class);
});
