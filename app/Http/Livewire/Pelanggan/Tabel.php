<?php

namespace App\Http\Livewire\Pelanggan;

use App\Models\pelanggan;
use Livewire\Component;

class Tabel extends Component
{
    public $pelanggans,$deleteid;
    protected $listeners = [
        'deleteConfirmed','refreshTable'
    ];


    public function render()
    {
        $this->pelanggans = pelanggan::all();
        return view('livewire.pelanggan.tabel');
    }

    public function refreshTable(){
        $this->hydrate();
    }

    public function delete($id){
        $this->deleteid = $id;
        $this->confirm('Apakah anda yakin akan menghapus pelanggan ini?', [
            'toast' => true,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'deleteConfirmed',
        ]);
    }

    public function deleteConfirmed()
    {
        $rekening = pelanggan::whereId($this->deleteid)->first();
        $rekening->delete();
        $this->alert(
            'success',
            'Pelanggan berhasil dihapus!'
        );
    }
}
