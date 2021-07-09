<?php

namespace App\Http\Livewire\Kendaraan;

use App\Models\kendaraan;
use Livewire\Component;

class Form extends Component
{
    public $status='Tambah';
    public $id_pel,$nama, $no_plat, $kapasitas;
    protected $listeners = ['edit' => 'editID','resetform'=>'res'];

    public function render()
    {
        return view('livewire.kendaraan.form');
    }

    public function res()
    {
        $this->reset();
    }

    public function editID($id){
        $this->status = "Edit";
        $kendaraan = kendaraan::whereId($id)->first();
        $this->id_pel = $kendaraan->id;
        $this->nama = $kendaraan->nama;
        $this->no_plat = $kendaraan->no_plat;
        $this->kapasitas = $kendaraan->kapasitas;
    }

    public function submitAdd(){
        if($this->status == 'Tambah'){
            $kendaraan = new kendaraan();
        }
        elseif($this->status == 'Edit'){
            $kendaraan = kendaraan::whereId($this->id_pel)->first();
        }
        $kendaraan->nama = $this->nama;
        $kendaraan->no_plat = $this->no_plat;
        $kendaraan->kapasitas = $this->kapasitas;
        $kendaraan->save();
        if($this->status == 'Tambah'){
            $this->alert(
                'success',
                'kendaraan berhasil ditambah!'
            );
        }
        if($this->status == 'Edit'){
            $this->alert(
                'success',
                'kendaraan berhasil diedit!'
            );
        }
        $this->reset();
//        return redirect()->to('/kendaraan');
        $this->emit('refreshTable');
    }

}
