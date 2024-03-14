<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $guarded = [];

    public function kategoriproduk(){
        return $this -> belongsTo(KategoriProduk::class,'id_kategoriproduk');
    }
}
