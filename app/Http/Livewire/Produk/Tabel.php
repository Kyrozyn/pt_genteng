<?php

namespace App\Http\Livewire\Produk;

use App\Models\produk;
use Livewire\Component;

class Tabel extends Component
{
    public $produks,$deleteid;
    protected $listeners = [
        'deleteConfirmed','refreshTable'
    ];

    public function render()
    {
        $this->produks = produk::all();
        return view('livewire.produk.tabel');
    }

    public function refreshTable(){
        $this->hydrate();
    }

    public function delete($id){
        $this->deleteid = $id;
        $this->confirm('Apakah anda yakin akan menghapus produk ini?', [
            'toast' => true,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'deleteConfirmed',
        ]);
    }

    public function deleteConfirmed()
    {
        $rekening = produk::whereId($this->deleteid)->first();
        $rekening->delete();
        $this->alert(
            'success',
            'produk berhasil dihapus!'
        );
    }
}
