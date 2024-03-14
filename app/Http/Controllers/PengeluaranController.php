<?php

namespace App\Http\Controllers;

use App\JenisPengeluaran;
use App\Karyawan;
use App\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengeluarans = Pengeluaran::all();
        return view('pengeluaran.index',['pengeluarans'=>$pengeluarans]);
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
        $jenispengeluarans = JenisPengeluaran::all();
        $pengeluarans = Pengeluaran::all();
        return view('pengeluaran.create',compact('karyawans','jenispengeluarans','pengeluarans'));
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
            'id_karyawan'=>'required',
            'id_jenispengeluaran' => 'required',
            'tanggal'=>'required|date',
            'keterangan' => 'required',
            'total' => 'required',

        ]);

        Pengeluaran::create($validateData);
        return redirect()->route('pengeluarans.index')->with('pesan',"Penambahan data pengeluaran berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $karyawans = Karyawan::all();
        $jenispengeluarans = JenisPengeluaran::all();
        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.edit',compact('karyawans','jenispengeluarans','pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'id_karyawan'=>'required',
            'id_jenispengeluaran' => 'required',
            'tanggal'=>'required|date',
            'keterangan' => 'required',
            'total' => 'required',

        ]);

        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->update($request->all());
        return redirect()->route('pengeluarans.index')->with('pesan',"Perubahan data telah disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        //
        $pengeluaran->delete();
        return redirect()->route('pengeluarans.index')->with('pesan',"Data berhasil dihapus");
    }
}
