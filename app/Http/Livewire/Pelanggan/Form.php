<?php

namespace App\Http\Livewire\Pelanggan;

use App\Models\pelanggan;
use Livewire\Component;

class Form extends Component
{
    public pelanggan $pelanggan;
    public $status='Tambah';
    public $id_pel,$nama, $alamat, $no_telp, $lat, $long;
    protected $listeners = ['edit' => 'editID','resetform'=>'res'];

    public function render()
    {
        return view('livewire.pelanggan.form');
    }

    public function res()
    {
        $this->reset();
    }

    public function mount(){
        if(!empty($this->pelanggan)){
            $this->status = "Edit";
            $this->id_pel = $this->pelanggan->id;
            $this->nama = $this->pelanggan->nama;
            $this->alamat = $this->pelanggan->alamat;
            $this->no_telp = $this->pelanggan->no_telp;
            $this->lat = $this->pelanggan->lat;
            $this->long = $this->pelanggan->long;
        }
    }

    public function submitAdd(){
        if($this->status == 'Tambah'){
            $pelanggan = new pelanggan();
        }
        elseif($this->status == 'Edit'){
            $pelanggan = pelanggan::whereId($this->id_pel)->first();
        }
        $pelanggan->nama = $this->nama;
        $pelanggan->alamat = $this->alamat;
        $pelanggan->no_telp = $this->no_telp;
        $pelanggan->lat = $this->lat;
        $pelanggan->long = $this->long;
        $pelanggan->save();

        if($this->status == 'Tambah'){
            $this->alert(
                'success',
                'Pelanggan berhasil ditambah!'
            );
        }
        if($this->status == 'Edit'){
            $this->alert(
                'success',
                'Pelanggan berhasil diedit!'
            );
        }
        return redirect()->to('/pelanggan');
    }

}
