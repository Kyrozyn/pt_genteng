<?php

namespace App\Http\Livewire\Pelanggan;

use App\Models\pelanggan;
use Livewire\Component;

class Form extends Component
{
    public $status='Tambah';
    public $id_pel,$nama, $alamat, $no_telp;
    protected $listeners = ['edit' => 'editID','resetform'=>'res'];

    public function render()
    {
        return view('livewire.pelanggan.form');
    }

    public function res()
    {
        $this->reset();
    }

    public function editID($id){
        $this->status = "Edit";
        $pelanggan = pelanggan::whereId($id)->first();
        $this->id_pel = $pelanggan->id;
        $this->nama = $pelanggan->nama;
        $this->alamat = $pelanggan->alamat;
        $this->no_telp = $pelanggan->no_telp;
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
        $this->reset();
//        return redirect()->to('/pelanggan');
        $this->emit('refreshTable');
    }

}
