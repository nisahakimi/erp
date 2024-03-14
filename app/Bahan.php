<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $guarded = [];
    public function pemasok(){
        return $this->belongsTo(Pemasok::class, 'id_pemasok');
    }
}
