<?php

namespace App\Http\Controllers;

use App\JenisPengeluaran;
use Illuminate\Http\Request;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenisPengeluarans = JenisPengeluaran::all();
        return view('jenispengeluaran.index',['jenispengeluarans'=>$jenisPengeluarans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jenispengeluaran.create');
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
            'jenis_pengeluaran' =>'required',
        ]);

        JenisPengeluaran::create($validateData);
        return redirect()->route('jenispengeluarans.index')->with('pesan',"Penambahan data {$validateData['jenis_pengeluaran']} berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPengeluaran $jenisPengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        //
        $jenisPengeluaran = JenisPengeluaran::find($id);
        return view('jenispengeluaran.edit',['jenispengeluaran'=>$jenisPengeluaran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'jenis_pengeluaran' =>'required',
        ]);

        $jenisPengeluaran = JenisPengeluaran::find($id);
        $jenisPengeluaran->update($request->all());
        return redirect()->route('jenispengeluarans.index')->with('pesan',"Data {$validateData['jenis_pengeluaran']} berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jenisPengeluaran = JenisPengeluaran::find($id);
        $jenisPengeluaran->delete();
        return redirect()->route('jenispengeluarans.index')->with('pesan',"Data $jenisPengeluaran->jenis_pengeluaran berhasil dihapus");
    }
}
