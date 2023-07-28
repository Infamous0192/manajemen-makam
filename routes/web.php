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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('mampu', App\Http\Controllers\MampuController::class);

    Route::resource('tpu', App\Http\Controllers\TpuController::class);
    Route::resource('makam', App\Http\Controllers\MakamController::class);
    Route::resource('jenazah-kenal', App\Http\Controllers\JenazahKenalController::class);
    Route::resource('jenazah', App\Http\Controllers\JenazahController::class);
    Route::resource('pesanan', App\Http\Controllers\PesananController::class);
    Route::resource('tumpangan', App\Http\Controllers\TumpanganController::class);
    Route::resource('pembayaran', App\Http\Controllers\PembayaranController::class);

    Route::get('get-mampu', [App\Http\Controllers\MampuController::class, 'getMampu'])->name('get.mampu');
    Route::get('/laporan/mampu', [App\Http\Controllers\LaporanController::class, 'mampu'])->name('laporan.mampu');
    Route::get('/laporan/waris', [App\Http\Controllers\LaporanController::class, 'waris'])->name('laporan.waris');
    Route::get('/laporan/kenal', [App\Http\Controllers\LaporanController::class, 'kenal'])->name('laporan.kenal');

    Route::resource('kenal', App\Http\Controllers\KenalController::class);
    Route::get('get-kenal', [App\Http\Controllers\KenalController::class, 'getkenal'])->name('get.kenal');

    Route::resource('waris', App\Http\Controllers\WarisController::class);
    Route::get('get-waris', [App\Http\Controllers\WarisController::class, 'getWaris'])->name('get.waris');
});
