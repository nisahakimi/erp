@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header border-0">
      {{-- <h3 class="mb-0">Details data Pelanggan</h3> --}}
      <div class="pt-3">
          <h1 class="h2 mr-auto">Data {{$pelanggan->nama}}</h1>
      </div>
      <hr>

      <ul>
          <li>Nama: {{$pelanggan->nama}}</li>
          <li>Jenis Kelamin: {{$pelanggan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki - laki'}}</li>
          <li>No. HP: {{$pelanggan->notelp}}</li>
          <li>Email: {{$pelanggan->email}}</li>
          <li>Alamat: {{$pelanggan->alamat}}</li>
      </ul>
  </div>
</div>
@endsection
