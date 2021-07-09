<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function pelanggan(){
        return view('dashboard.pelanggan.tabel');
    }

    public function produk(){
        return view('dashboard.produk.tabel');
    }

    public function kendaraan(){
        return view('dashboard.kendaraan.tabel');
    }
}
