@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Edit Data Produk</h3>
        <form action="{{ route('produks.update',['produk'=>$produk->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="position-relative row form-group"><label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk
                <i class="text-danger">*</i>
            </label>
                <div class="col-sm-10">
                    <input name="nama_produk" id="nama_produk" placeholder="Nama Produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror"  value="{{ old('nama_produk') ?? $produk->nama_produk}}">
                    @error('nama_produk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="id_kategoriproduk" class="col-sm-2 col-form-label">Kategori Produk
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-10">
                    <select class="mb-2 form-control @error('id_kategoriproduk') is-invalid @enderror" name="id_kategoriproduk" id="id_kategoriproduk">
                        <option value="" disabled selected>Pilih Kategori Produk</option>
                        @foreach ($kategoriproduks as $kategoriproduk)
                            @if ($kategoriproduk->id == $produk->id_kategoriproduk)
                                <option value="{{$kategoriproduk->id}}" selected="selected">{{$kategoriproduk->nama_kategori}}</option>
                            @else
                            <option value="{{$kategoriproduk->id}}"> {{$kategoriproduk->nama_kategori}} </option>
                            @endif

                        @endforeach
                    </select>
                </div>
                @error('id_kategoriproduk')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
            </div>

            <div class="position-relative row form-group"><label for="harga" class="col-sm-2 col-form-label">Harga
                <i class="text-danger">*</i>
            </label>
                <div class="col-sm-10">
                    <input name="harga" id="harga" placeholder="Harga Produk" type="text" class="form-control  @error('harga') is-invalid @enderror"  value="{{ old('harga') ?? $produk->harga}}">
                </div>
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="position-relative row form-group">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Produk
                 </label>
                <div class="col-sm-10">
                <textarea name="deskripsi" id="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror">{{old('deskripsi') ?? $produk->deskripsi}}</textarea>
                </div>
                @error('deskripsi')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
            </div>

            <div class="position-relative row form-group">
                <label for="stok" class="col-sm-2 col-form-label">Stok
                    <i class="text-danger">*</i>
                 </label>
                <div class="col-sm-10">
                    <input type="text" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Jumlah stok produk"  value="{{old('stok') ?? $produk->stok}} ">
                </div>
                @error('stok')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
