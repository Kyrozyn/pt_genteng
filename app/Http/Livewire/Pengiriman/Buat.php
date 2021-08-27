<?php

namespace App\Http\Livewire\Pengiriman;

use App\Models\kendaraan;
use Livewire\Component;

class Buat extends Component
{
    public function render()
    {
        $kendaraans = kendaraan::all();
        return view('livewire.pengiriman.buat',compact('kendaraans'));
    }
}
