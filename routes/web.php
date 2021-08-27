<?php

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
    return redirect('login');
});

Route::get('/dashboard', [\App\Http\Controllers\Dashboard::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/pelanggan', \App\Http\Livewire\Pelanggan\Tabel::class);
    Route::get('/pelanggan/tambah', \App\Http\Livewire\Pelanggan\Form::class);
    Route::get('/pelanggan/edit/{pelanggan}', \App\Http\Livewire\Pelanggan\Form::class);
    Route::get('/produk', \App\Http\Livewire\Produk\Tabel::class);
    Route::get('/kendaraan', \App\Http\Livewire\Kendaraan\Tabel::class);
    Route::get('/pemesanan', \App\Http\Livewire\Pemesanan\Pesan::class);
    Route::get('/pemesanan/lihat', \App\Http\Livewire\Pemesanan\Table::class);
    Route::get('/pemesanan/lihat/{id}',[\App\Http\Controllers\Dashboard::class,'PemesananDetail']);
    Route::get('/pengiriman/buat', \App\Http\Livewire\Pengiriman\Buat::class);
    Route::get('/pengiriman/buat/{kendaraan}', \App\Http\Livewire\Pengiriman\Buatinvoice::class);
    Route::get('/pengiriman/invoice', \App\Http\Livewire\Invoice\Table::class);
    Route::get('/pengiriman/invoice/{invoice}', \App\Http\Livewire\Invoice\Detail::class);
    Route::get('/laporan/invoice/{invoice}', [\App\Http\Controllers\Invoice::class,'laporan']);

});
require __DIR__.'/auth.php';
