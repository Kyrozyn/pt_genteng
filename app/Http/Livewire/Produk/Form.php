<?php

namespace App\Http\Livewire\Produk;

use App\Models\produk;
use Livewire\Component;

class Form extends Component
{
    public $status='Tambah';
    public $id_pel,$id_produk,$nama, $deskripsi, $jenis="Aksesoris", $stok=0;
    protected $listeners = ['edit' => 'editID','resetform'=>'res'];
    protected $rules = [
        'id_produk' => 'required|digits:3|unique:App\Models\produk,id|numeric',
        'nama' => 'required',
        'deskripsi' => 'required',
        'jenis' => 'required',
        'stok' => 'required',
    ];
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
        $this->id_produk = str_pad($produk->id,3,'0',STR_PAD_LEFT);
        $this->nama = $produk->nama;
        $this->deskripsi = $produk->deskripsi;
        $this->jenis = $produk->jenis;
        $this->stok = $produk->stok;
    }

    public function submitAdd(){
        if($this->status == 'Tambah'){
            $produk = new produk();
            $produk->id = $this->id_produk;
        }
        elseif($this->status == 'Edit'){
            $this->rules['id_pegawai_training'] = 'required|digits:3|numeric';
            $produk = produk::whereId($this->id_pel)->first();
        }
        $this->validate();
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
