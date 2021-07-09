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

Route::get('/pelanggan',[\App\Http\Controllers\Dashboard::class,'pelanggan']);
Route::get('/produk',[\App\Http\Controllers\Dashboard::class,'produk']);
Route::get('/kendaraan',[\App\Http\Controllers\Dashboard::class,'kendaraan']);
require __DIR__.'/auth.php';
