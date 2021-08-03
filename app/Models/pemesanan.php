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
        return $this->belongsToMany(produk::class);
    }
}
