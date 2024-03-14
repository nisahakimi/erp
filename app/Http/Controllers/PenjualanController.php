<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Pelanggan;
use App\Penjualan;
use App\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penjualans = Penjualan::all();
        return view('penjualan.index',['penjualans'=>$penjualans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        $penjualans = Penjualan::all();
        return view('penjualan.create',compact('penjualans','pelanggans','produks'));
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
            'tanggal_penjualan' => 'required|date',
            'id_produk' =>'required',
            'jumlah' =>'required|numeric',
            'total'=>'',
        ]);

        Penjualan::create($validateData);
        return redirect()->route('penjualans.index')->with('pesan',"Data penjualan berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        $penjualan = Penjualan::find($id);
        return view('penjualan.edit',compact('penjualan','pelanggans','produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'id_pelanggan' => 'required',
            'tanggal_penjualan' => 'required|date',
            'id_produk' =>'required',
            'jumlah' =>'required|numeric',
            'total'=>'',
        ]);

        $penjualan = Penjualan::find($id);
        $penjualan->update($request->all());
        return redirect()->route('penjualans.index')->with('pesan',"Data penjualan berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
        $penjualan ->delete();
        return redirect()->route('penjualans.index')->with('pesan',"Data berhasil dihapus");
    }
}
