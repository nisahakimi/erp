<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Karyawan;
use App\KategoriProduk;
use App\Pemasok;
use App\Pembelian;
use App\Produk;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembelians = Pembelian::all();
        return view('pembelian.index',['pembelians'=>$pembelians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $karyawans = Karyawan::all();
        $bahans = Bahan::all();
        $pembelians = Pembelian::all();
        return view('pembelian.create',compact('karyawans','bahans','pembelians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'nofaktur' => 'required',
            'id_karyawan'=>'required',
            'id_bahan'=>'required',
            'jumlah'=>'required|numeric',
            'harga'=>'required',
            'tanggal'=>'required|date',
        ]);

        $pembelian = new Pembelian();
        $pembelian->nofaktur = $validateData['nofaktur'];
        $pembelian->id_karyawan = $validateData['id_karyawan'];
        $pembelian->id_bahan = $validateData['id_bahan'];
        $pembelian->jumlah = $validateData['jumlah'];
        $pembelian->harga = $validateData['harga'];
        $pembelian->tanggal = $validateData['tanggal'];

        $stokawal = Bahan::where('id', $request->id_bahan)->value('stok');
        $bahan = Bahan::find($request->input('id_bahan'));
        $bahan->stok = $stokawal + $request->input('jumlah');
        $bahan->save();
        $pembelian->save();
        // $this->updateStokBahan($request);
        return redirect()->route('pembelians.index')->with('pesan',"Data pembelian berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $karyawans = Karyawan::all();
        $bahans = Bahan::all();
        $pembelian = Pembelian::find($id);

        return view('pembelian.edit',compact('pembelian','karyawans','bahans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'nofaktur' => 'required',
            'id_karyawan'=>'required',
            'id_bahan'=>'required',
            'harga'=>'required',
            'jumlah'=>'required|numeric',
            'tanggal'=>'required|date',
        ]);

        $pembelian = Pembelian::find($id);
        $pembelian->update($request->all());
        return redirect()->route('pembelians.index')->with('pesan',"Data pembelian berhasil diupdate");
    }

    // public function getTotalPembelian(){
    //     return $this->pembelians->sum(function($pembelian){
    //         return $pembelian->harga * $pembelian->jumlah;
    //     });
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        $pembelian = Pembelian::find($id);
        // $stokbahan = Bahan::where('id',$id)->value('stok');
        $bahan = Bahan::where('id',$pembelian->id_bahan)->first();
        // $jumlahbeli = Pembelian::where('id',$id)->value('jumlah');

        // $bahan->stok = $stokbahan - $jumlahbeli;

        $bahan->stok= $bahan->stok - $pembelian->jumlah;

        $bahan->save();
        $pembelian->delete();
    //    $hasil =  DB::table('bahans')->where('id',$pembelian->id_bahan)->save($stok = $bahan->stok - $pembelian->jumlah);
    //    dump($bahan->stok);
        return redirect()->route('pembelians.index')->with('pesan',"Data berhasil dihapus");
    }

    public function cetakFaktur($id){
        $pembelians = Pembelian::find($id);
        $bahans = Bahan::where('id', $pembelians->id_bahan)->with('pemasok')->get();
        dump($pembelians);
        dump($bahans);

        // $pdf = PDF::loadview('pembelian/fakturpembelian',compact('pembelians','bahans'));
        // return $pdf->stream();
    }
}
