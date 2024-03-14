<?php

namespace App\Http\Controllers;

use App\Pembelian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class LaporanPembelianController extends Controller
{
    //
    public function index(){
        // $pembelians = Pembelian::all();
        // return view('laporanpembelian.index',['pembelians'=>$pembelians]);
        $start = Carbon::now()->startOfMonth()->format('Y-m-d'); //untuk mengambil tanggal 1
        $end = Carbon::now()->endOfMonth()->format('Y-m-d'); //mengambil tanggal terakhir dari bulan

        if(request()->date != ''){
            $date = explode(' - ',request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d');
            $end = Carbon::parse($date[1])->format('Y-m-d');
        }

        $pembelians = Pembelian::whereBetween('tanggal',[$start,$end])->get();
        return view('laporanpembelian.index',compact('pembelians'));
    }

    public function cetak($daterange){
        $date = explode('+', $daterange);

        $start = Carbon::parse($date[0]->format('Y-m-d'));
        $end = Carbon::parse($date[1]->format('Y-m-d'));


        $pembelians = Pembelian::whereBetween('tanggal',[$start,$end])->get();

        $pdf = PDF::loadview('laporanpembelian/laporanpembelian',compact('pembelians','date'));
        return $pdf->download('laporan-pembelian.pdf');
    }
}
