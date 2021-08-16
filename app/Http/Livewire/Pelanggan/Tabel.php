<?php

namespace App\Http\Livewire\Pelanggan;

use App\Models\pelanggan;
use Livewire\Component;
use Livewire\WithPagination;

class Tabel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $deleteid,$caripelanggan;
    protected $listeners = [
        'deleteConfirmed','refreshTable'
    ];

    public function render()
    {
        $caripelanggan = '%'.$this->caripelanggan.'%';
        if(!$this->caripelanggan == null or !$this->caripelanggan == ''){
            $pelanggans = pelanggan::where('id','like',$caripelanggan)
                ->orWhere('nama','like',$caripelanggan)
                ->orWhere('alamat','like',$caripelanggan)
                ->paginate(10);
        }
        else{
            $pelanggans = pelanggan::paginate(10);
        }
        return view('livewire.pelanggan.tabel',compact('pelanggans'));
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
