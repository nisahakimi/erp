<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $guarded = [];
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
