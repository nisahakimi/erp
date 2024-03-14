<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $karyawans = Karyawan::all();
        return view('karyawan.index',['karyawans'=>$karyawans]);
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
        return view('karyawan.create',['karyawans'=>$karyawans]);

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
        $validateDate = $request -> validate([
            'nama'=>'required|max:50',
            'jenis_kelamin'=>'required|in:P,L',
            'notelp'=>'required',
            'email'=>'',
            'alamat'=>'required',
        ]);

        Karyawan::create($validateDate);
        return redirect()->route('karyawans.index')->with('pesan',"Penambahan data  {$validateDate['nama']} berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($karyawan)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $karyawan = Karyawan::find($id);
        return view('karyawan.edit',compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {

        $validateDate = $request -> validate([
            'nama'=>'required|max:50',
            'jenis_kelamin'=>'required|in:P,L',
            'notelp'=>'required',
            'email'=>'',
            'alamat'=>'required',
        ]);

        // $karyawan = Karyawan::find($id);
        // $karyawan->update($request->all());
        Karyawan::where('id',$karyawan->id)->update($validateDate);
        return redirect()->route('karyawans.index')->with('pesan',"Data {$validateDate['nama']} telah di ubah ");

        // dump($request->all());
        // dump($karyawan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //

        $karyawan->delete();
        return redirect()->route('karyawans.index')->with('pesan',"Data $karyawan->nama telah dihapus");
    }
}
