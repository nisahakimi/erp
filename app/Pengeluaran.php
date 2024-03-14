<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    //
    protected $guarded = [];

    public function karyawan(){
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function jenispengeluaran(){
        return $this->belongsTo(JenisPengeluaran::class, 'id_jenispengeluaran');
    }
}
