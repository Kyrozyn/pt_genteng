<?php

namespace App\Http\Livewire\Pemesanan;

use App\Models\produk;
use Livewire\Component;
use Livewire\WithPagination;

class Pesan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cariproduk;
    public $produkselectedid=[], $jumlahproduk=[];

    public function render()
    {
        if(count($this->produkselectedid) > 0){
            $produkselected = produk::whereIn('id',$this->produkselectedid)->get();
            foreach ($produkselected as $produk){
                if($this->jumlahproduk[$produk->id] > $produk->stok){
                    //proteksi agar tidak melebihi stok
                    $this->jumlahproduk[$produk->id] = $produk->stok;
                }
                elseif($this->jumlahproduk[$produk->id] < 1){
                    $this->jumlahproduk[$produk->id] = 1;
                }
            }
        }
        else{
            $produkselected = null;
        }
        $cariproduk = '%'.$this->cariproduk.'%';
        return view('livewire.pemesanan.pesan',[
            'produks' => produk::where('id','like',$cariproduk)
                ->orWhere('nama','like',$cariproduk)
                ->orWhere('deskripsi','like',$cariproduk)
                ->orWhere('satuan','like',$cariproduk)
                ->paginate(5),
            'produkselected' => $produkselected
        ]);
    }

    public function tambahProduk($id,$jumlah){
        array_push($this->produkselectedid,$id);
        $this->jumlahproduk[$id] = $jumlah;
    }


}
