<?php

namespace App\Http\Controllers;

use App\Pesanan;
use Illuminate\Http\Request;

class ArsipPesananController extends Controller
{
    //
    public function index(){
        $pesanans = Pesanan::all();
        return view('arsippesanan.arsippesanan',['pesanans'=>$pesanans]);
    }
}
