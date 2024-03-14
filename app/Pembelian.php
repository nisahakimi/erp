<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
    protected $guarded = [];
    public function karyawan(){
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function bahan(){
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }

}
