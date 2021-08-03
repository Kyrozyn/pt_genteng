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
    Route::get('/produk', \App\Http\Livewire\Produk\Tabel::class);
    Route::get('/kendaraan', \App\Http\Livewire\Kendaraan\Tabel::class);
    Route::get('/pemesanan', \App\Http\Livewire\Pemesanan\Pesan::class);
});
require __DIR__.'/auth.php';
