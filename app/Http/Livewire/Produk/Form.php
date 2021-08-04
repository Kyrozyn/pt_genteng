<?php

namespace App\Http\Livewire\Produk;

use App\Models\produk;
use Livewire\Component;

class Form extends Component
{
    public $status='Tambah';
    public $id_pel,$nama, $deskripsi, $jenis="Aksesoris", $stok=0;
    protected $listeners = ['edit' => 'editID','resetform'=>'res'];

    public function render()
    {
        return view('livewire.produk.form');
    }

    public function res()
    {
        $this->reset();
    }

    public function editID($id){
        $this->status = "Edit";
        $produk = produk::whereId($id)->first();
        $this->id_pel = $produk->id;
        $this->nama = $produk->nama;
        $this->deskripsi = $produk->deskripsi;
        $this->jenis = $produk->jenis;
        $this->stok = $produk->stok;
    }

    public function submitAdd(){
        if($this->status == 'Tambah'){
            $produk = new produk();
        }
        elseif($this->status == 'Edit'){
            $produk = produk::whereId($this->id_pel)->first();
        }
        $produk->nama = $this->nama;
        $produk->deskripsi = $this->deskripsi;
        $produk->jenis = $this->jenis;
        $produk->stok = $this->stok;
        $produk->save();
        if($this->status == 'Tambah'){
            $this->alert(
                'success',
                'produk berhasil ditambah!'
            );
        }
        if($this->status == 'Edit'){
            $this->alert(
                'success',
                'produk berhasil diedit!'
            );
        }
        $this->reset();
//        return redirect()->to('/produk');
        $this->emit('refreshTable');
    }

}
