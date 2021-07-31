<?php

namespace App\Http\Livewire\Kendaraan;

use App\Models\kendaraan;
use Livewire\Component;

class Tabel extends Component
{
    public $kendaraans,$deleteid;
    protected $listeners = [
        'deleteConfirmed','refreshTable'
    ];

    public function render()
    {
        $this->kendaraans = kendaraan::all();
        return view('livewire.kendaraan.tabel');
    }

    public function refreshTable(){
        $this->hydrate();
    }

    public function delete($id){
        $this->deleteid = $id;
        $this->confirm('Apakah anda yakin akan menghapus kendaraan ini?', [
            'toast' => true,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'deleteConfirmed',
        ]);
    }

    public function deleteConfirmed()
    {
        $rekening = kendaraan::whereId($this->deleteid)->first();
        $rekening->delete();
        $this->alert(
            'success',
            'kendaraan berhasil dihapus!'
        );
    }
}
