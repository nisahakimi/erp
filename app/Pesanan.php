<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    //
    protected $guarded = [];

    public function kategoriproduk(){
        return $this->belongsTo(KategoriProduk::class, 'id_kategoriproduk');
    }

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }


}
