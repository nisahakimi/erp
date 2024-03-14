<?php

namespace App\Http\Controllers;

use App\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pemasoks = Pemasok::all();
        return view('pemasok.index',['pemasoks'=>$pemasoks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pemasok.create');
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
        $validateData = $request -> validate([
            'nama' => 'required|min:3|max:50',
            'alamat'=>'required',
            'notelp'=>'required',
            'email'=>'',
        ]);

        Pemasok::create($validateData);
        return redirect()->route('pemasoks.index')->with('pesan',"Penambahan data {$validateData['nama']} berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasok $pemasok)
    {
        //
        return view('pemasok.edit',['pemasok' => $pemasok]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasok $pemasok)
    {
        //
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'alamat'=>'required',
            'notelp'=>'required',
            'email'=>'',
        ]);

        Pemasok::where('id',$pemasok->id)->update($validateData);
        return redirect()->route('pemasoks.index')->with('pesan',"Update data {$validateData['nama']} berhasil");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $pemasok)
    {
        //
        $pemasok->delete();
        return redirect()->route('pemasoks.index')->with('pesan',"Hapus data $pemasok->nama berhasil");
    }
}
