@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header border-0">
      {{-- <h3 class="mb-0">Details data Pelanggan</h3> --}}
      <div class="pt-3">
          <h1 class="h2 mr-auto">Data {{$produk->nama_produk}}</h1>
      </div>
      <hr>

      <ul>
          <li>Nama Produk: {{$produk->nama_produk}}</li>
          <li>Kategori Produk: {{$produk->kategoriproduk->nama_kategori}}</li>
          <li>No. HP: {{$produk->harga}}</li>
          <li>Email: {{$produk->deskripsi}}</li>
          <li>Alamat: {{$produk->stok}}</li>
      </ul>
  </div>
</div>
@endsection
