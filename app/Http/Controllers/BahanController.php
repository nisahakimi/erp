<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Pemasok;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahans = Bahan::all();
        return view('bahan.index',['bahans'=>$bahans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasoks = Pemasok::all();
        $bahans = Bahan::all();
        // return view('bahan.create',['suppliers'=> $suppliers]);
        return view('bahan.create', compact('pemasoks','bahans'));
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
            'nama_bahan' => 'required|min:3|max:50',
            'id_pemasok' => 'required|numeric',
            'stok'=>'',
            'satuan'=>'required',
        ]);

        Bahan::create($validateData);
        return redirect()->route('bahans.index')->with('pesan',"Penambahan data {$validateData['nama_bahan']} berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function show(Bahan $bahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pemasoks = Pemasok::all();
        $bahan = Bahan::find($id);
        return view('bahan.edit',['bahan'=>$bahan,'pemasoks'=>$pemasoks]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'nama_bahan' => 'required|min:3|max:50',
            'id_pemasok' => 'required|numeric',
            'stok'=>'',
            'satuan'=>'required',
        ]);

        $bahan = Bahan::find($id);
        $bahan->update($request->all());
        return redirect()->route('bahans.index')->with('pesan',"Update data bahan {$validateData['nama_bahan']} berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahan $bahan)
    {
        //
        $bahan->delete();
        return redirect()->route('bahans.index')->with('pesan',"Hapus data $bahan->nama_bahan berhasil");
    }
}
