<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
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

    public function PemesananDetail($id)
    {
        $pemesanan = pemesanan::whereId($id)->first();
        $produk = $pemesanan->produk()->get();
        return view('dashboard.pemesanan.detail', compact('pemesanan','produk'));
    }
}
