<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function produk()
    {
        return $this->belongsToMany(produk::class)->withPivot('jumlah');
    }

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class,'pelanggan_id','id');
    }

    public function invoice()
    {
        return $this->belongsToMany(invoice::class, 'invoice_pemesanan');
    }
}
