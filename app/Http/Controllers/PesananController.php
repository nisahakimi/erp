<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Karyawan;
use App\KategoriProduk;
use App\Pelanggan;
use App\Produk;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pesanans = Pesanan::all();

        return view('pesanan.index',['pesanans'=>$pesanans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategoriproduks = KategoriProduk::all();
        $pelanggans = Pelanggan::all();
        $pesanans = Pesanan::all();
        return view('pesanan.create',compact('karyawans','pelanggans','kategoriproduks','pesanans'));

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
            'id_pelanggan' => 'required',
            'id_kategoriproduk' => 'required',
            'tanggal' =>'required|date',
            'nofaktur'=>'required',
            'deskripsi' => '',
            'jumlah'=>'required',
            'harga' => 'required',
            'status_pembayaran' =>'required',
            'status_pesanan' => 'required',
        ]);

        Pesanan::create($validateData);

        $status = $request->input('status_pesanan');

        // dump($status);

        if ($status != 'selesai'){
            return redirect()->route('pesanans.index')->with('pesan',"Data pesanan berhasil ditambahkan");
        }
        else
        {
            return redirect()->route('arsippesanans.index')->with('pesan',"Data pesanan berhasil ditambahkan");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $karyawans = Karyawan::all();
        $kategoriproduks = KategoriProduk::all();
        $pelanggans = Pelanggan::all();
        $pesanan = Pesanan::find($id);
        return view('pesanan.edit',compact('pesanan','karyawans','pelanggans','kategoriproduks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'id_pelanggan' => 'required',
            'id_kategoriproduk' => 'required',
            'tanggal' =>'required|date',
            'deskripsi' => '',
            'jumlah'=>'required',
            'harga' => 'required',
            'status_pembayaran' =>'required',
            'status_pesanan' => 'required',
        ]);

        $pesanans = Pesanan::find($id);
        $pesanans->update($request->all());
        return redirect()->route('pesanans.index')->with('pesan',"Data pesanan berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
        $pesanan->delete();
        return redirect()->route('pesanans.index')->with('pesan',"Data berhasil dihapus");
    }

    public function penguranganBahan(){

    }
}
