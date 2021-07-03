<?php

namespace App\Http\Livewire\Pelanggan;

use Livewire\Component;

class Form extends Component
{
    public $status='Tambah';
    public $nama, $alamat, $no_telp;

    public function render()
    {
        return view('livewire.pelanggan.form');
    }

    public function submitAdd(){

    }


}
