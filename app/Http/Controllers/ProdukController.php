<?php

namespace App\Http\Controllers;

use App\KategoriProduk;
use App\Produk;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produks = Produk::all();
        return view('produk.index',['produks'=>$produks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriproduks = KategoriProduk::all();
        $produks = Produk::all();
        return view('produk.create', compact('kategoriproduks','produks'));
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
            'nama_produk' =>'required|max:50',
            'id_kategoriproduk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => '',
            'stok' => 'required',
        ]);

        Produk::create($validateData);
        //dump($validateData);
        return redirect()->route('produks.index')->with('pesan',"Penambahan data {$validateData['nama_produk']} berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $result = Produk::findOrFail($id);
        $kategoriproduk = KategoriProduk::findOrFail($id);
        return view('produk.show',['produk'=>$result,'kategoriproduk'=>$kategoriproduk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategoriproduks = KategoriProduk::all();
        $produk = Produk::find($id);
        return view('produk.edit',['produk'=>$produk, 'kategoriproduks'=>$kategoriproduks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $validateData = $request->validate([
            'nama_produk' =>'required|max:50',
            'id_kategoriproduk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => '',
            'stok' => 'required',
        ]);
        $produk = Produk::find($id);
        $produk->update($request->all());
        return redirect()->route('produks.index')->with('pesan',"Data {$validateData['nama_produk']} berhasil diubah");


    }

    public function tambahstok(Request $request,$id){
        $validateData = $request->validate([
            'nama_produk' => 'required|max:50',
            'stok' => 'required',
        ]);

        $produk = Produk::find($id);
        $produk->nama_produk = $validateData['nama_produk'];
        $stokawal = Produk::where('id', $id)->value('stok');
        $produk->stok = $stokawal + $request->input('stok');
        // dump($stokawal);
        // dump($produk->stok);
        $produk->save();
        return redirect()->route('produks.index')->with('pesan',"Stok {$validateData['nama_produk']} berhasil ditambahkan");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //

        $produk->delete();
        return redirect()->route('produks.index')->with('pesan',"Data $produk->nama_produk berhasil dihapus");
    }
}
