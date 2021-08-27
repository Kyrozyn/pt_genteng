<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Invoice extends Controller
{
    private $lat = -6.923577, $long = 107.677748;
    public function laporan($id){
        $invoice = \App\Models\invoice::whereId($id)->first();
        $lat_toko = $this->lat;
        $long_toko = $this->long;
        return view('laporan.invoice', compact('invoice','lat_toko','long_toko'));
    }
}
