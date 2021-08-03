<?php

namespace App\Http\Livewire\Pemesanan;

use App\Models\pelanggan;
use App\Models\pemesanan;
use App\Models\pemesanan_produk;
use App\Models\produk;
use Livewire\Component;
use Livewire\WithPagination;

class Pesan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cariproduk,$caripelanggan;
    public $produkselectedid=[], $jumlahproduk=[], $idpelanggan,$pending=false, $tanggal, $keterangan;
    protected $casts = [
        'tanggal' => 'date:Y-m-d'
    ];

    public function render()
    {
        if(count($this->produkselectedid) > 0){
            $produkselected = produk::whereIn('id',$this->produkselectedid)->get();
            foreach ($produkselected as $produk){
                if($this->jumlahproduk[$produk->id] > $produk->stok){
                    //proteksi agar tidak melebihi stok
//                    $this->jumlahproduk[$produk->id] = $produk->stok;
                }
                elseif($this->jumlahproduk[$produk->id] < 1){
                    $this->jumlahproduk[$produk->id] = 1;
                }
            }
            foreach ($produkselected as $produk){
                if($this->jumlahproduk[$produk->id] > $produk->stok){
                    $this->pending = true;
                    break;
                }
                else{
                    $this->pending = false;
                }

            }
        }
        else{
            $produkselected = null;
        }
        $cariproduk = '%'.$this->cariproduk.'%';
        $caripelanggan = '%'.$this->caripelanggan.'%';
        $pelanggans = null;
        if(!$this->caripelanggan == null or !$this->caripelanggan == ''){
            $pelanggans = pelanggan::where('id','like',$caripelanggan)
                ->orWhere('nama','like',$caripelanggan)
                ->orWhere('alamat','like',$caripelanggan)
                ->get();
        }

        return view('livewire.pemesanan.pesan',[
            'produks' => produk::where('id','like',$cariproduk)
                ->orWhere('nama','like',$cariproduk)
                ->orWhere('deskripsi','like',$cariproduk)
                ->orWhere('satuan','like',$cariproduk)
                ->paginate(5,['*'],'produk'),
            'produkselected' => $produkselected,
            'pelanggans' => $pelanggans
        ]);
    }

    public function tambahProduk($id,$jumlah){
        array_push($this->produkselectedid,$id);
        $this->jumlahproduk[$id] = $jumlah;
    }

    public function buatPemesanan()
    {
        $pemesanan = new pemesanan();
        $pemesanan->tanggal_pengiriman = $this->tanggal;
        $pemesanan->pelanggan_id = $this->idpelanggan;
        $pemesanan->keterangan = $this->keterangan;
        $pemesanan->save();

        foreach ($this->jumlahproduk as $id_barang => $jumlah){
            $pemesanan_produk = new pemesanan_produk();
            $pemesanan_produk->pemesanan_id = $pemesanan->id;
            $pemesanan_produk->produk_id = $id_barang;
            $pemesanan_produk->jumlah = $jumlah;
            $pemesanan_produk->save();
        }

        $this->alert(
            'success',
            'Pemesanan berhasil dibuat!'
        );
    }


}
