<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index',['pelanggans'=> $pelanggans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
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
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'notelp' => 'required',
            'email' =>'',
            'alamat' => 'required',
        ]);

        Pelanggan::create($validateData);
        // return "Data berhasil ditambahkan";
        return redirect()->route('pelanggans.index')->with('pesan',"Penambahan data {$validateData['nama']} berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($pelanggan)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit',['pelanggan' => $pelanggan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        // dump($request->all());
        // dump($pelanggan);

        $validateData= $request->validate([
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'notelp' => 'required',
            'email' =>'',
            'alamat' => 'required',
        ]);

        Pelanggan::where('id', $pelanggan->id)->update($validateData);
        //atau $pelanggan->update($validateData)

        return redirect()->route('pelanggans.index')->with('pesan',"Update data {$validateData['nama']} berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggans.index')->with('pesan',"Hapus data $pelanggan->nama berhasil");
    }
}
