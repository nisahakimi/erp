<?php

namespace App\Http\Controllers;

use App\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriProduks = KategoriProduk::all();
        return view('kategoriproduk.index',['kategoriproduks'=> $kategoriProduks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kategoriproduk.create');
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
            'nama_kategori'=> 'required|min:3'
        ]);

        KategoriProduk::create($validateData);
        return redirect()->route('kategoriproduks.index')->with('pesan',"Data kategori {$validateData['nama_kategori']} berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $kategoriProduk = KategoriProduk::find($id);
        return view('kategoriproduk.edit',['kategoriproduk'=>$kategoriProduk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_kategori'=> 'required|min:3'
        ]);
        $kategoriProduk=KategoriProduk::find($id);
        $kategoriProduk->update($request->all());
        return redirect()->route('kategoriproduks.index')->with('pesan',"Update data kategori {$validateData['nama_kategori']} berhasil");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kategoriProduk = KategoriProduk::find($id);
        $kategoriProduk->delete();
        return redirect()->route('kategoriproduks.index')->with('pesan',"Hapus data $kategoriProduk->nama_kategori berhasil");
    }
}
