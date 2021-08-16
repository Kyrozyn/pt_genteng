<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan_produk extends Model
{
    use HasFactory;
    protected $table = 'pemesanan_produk';
    public $timestamps=false;
}
