<?php

namespace App\Http\Livewire\Pemesanan;

use App\Models\pemesanan;
use App\Models\pemesanan_produk;
use Livewire\Component;

class Table extends Component
{
    public $deleteid;
    protected $listeners = [
        'deleteConfirmed','refreshTable'
    ];

    public function refreshTable(){
        $this->hydrate();
    }

    public function render()
    {
        return view('livewire.pemesanan.table',[
            'pemesanans' => pemesanan::all()
        ]);
    }

    public function delete($id){
        $this->deleteid = $id;
        $this->confirm('Apakah anda yakin akan menghapus pemesanan ini?', [
            'toast' => true,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'deleteConfirmed',
        ]);
    }

    public function deleteConfirmed()
    {
        $pemesanan = pemesanan::whereId($this->deleteid)->first();
        $pemesanan->delete();
        $pemesanan_produk = pemesanan_produk::wherePemesananId($this->deleteid)->delete();
        $this->alert(
            'success',
            'Pemesanan berhasil dihapus!'
        );
    }
}
