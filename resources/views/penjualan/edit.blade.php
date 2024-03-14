@extends('layouts.app')

@section('content')
<div class="card-body"><h2 class="card-title">Edit Data Penjualan</h2>
    <form action="{{ route('penjualans.update',['penjualan'=>$penjualan->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="position-relative row form-group">
            <label for="id_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan
                <i class="text-danger">*</i>
            </label>
            <div class="col-sm-8">
                <select class="mb-2 form-control @error('id_pelanggan') is-invalid @enderror" name="id_pelanggan" id="id_pelanggan">
                    <option value="" disabled selected>Pilih pelanggan</option>
                    @foreach ($pelanggans as $pelanggan)
                        @if ($pelanggan->id == $penjualan->id_pelanggan)
                            <option value="{{$pelanggan->id}}" selected="selected>">{{$pelanggan->nama}}</option>
                        @else
                        <option value="{{$pelanggan->id}}"> {{$pelanggan->nama}} </option>
                        @endif

                    @endforeach
                </select>
            </div>
            @error('id_pelanggan')
                <div class="text-danger">{{$message}}</div>
             @enderror
             <div class="col-sm-2">
                <a href="{{route('pelanggans.create')}}" class="btn btn-success " >
                    <i class="fa fa-plus fa-lg"></i>
                </a>
            </div>
        </div>

        <div class="position-relative row form-group"><label for="tanggal_penjualan" class="col-sm-2 col-form-label">Tanggal Penjualan</label>
            <div class="col-sm-10">
                <input type="date" name="tanggal_penjualan" id="tanggal_penjualan" class="form-control @error('tanggal_penjualan') is-invalid @enderror" placeholder="Tanggal Penjualan"  value="{{old('tanggal_penjualan') ?? $penjualan->tanggal_penjualan}}">
            </div>
            @error('tanggal_penjualan')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="position-relative row form-group">
            <label for="id_produk" class="col-sm-2 col-form-label">Produk
                <i class="text-danger">*</i>
            </label>
            <div class="col-sm-10">
                <select class="mb-2 form-control @error('id_produk') is-invalid @enderror" name="id_produk" id="id_produk">
                    <option value="" disabled selected>Pilih produk</option>
                    @foreach ($produks as $produk)
                        @if ($produk->id==$penjualan->id_produk)
                            <option value="{{$produk->id}}" selected="selected">{{$produk->nama_produk}}</option>
                        @else
                            <option value="{{$produk->id}}"> {{$produk->nama_produk}} </option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('id_produk')
                <div class="text-danger">{{$message}}</div>
             @enderror
        </div>

        <div class="position-relative row form-group"><label for="jumlah" class="col-sm-2 col-form-label">Jumlah produk
            <i class="text-danger">*</i>
        </label>
            <div class="col-sm-10">
                <input name="jumlah" id="jumlah" placeholder="Jumlah produk" type="text" class="form-control @error('jumlah') is-invalid @enderror"  value="{{ old('jumlah') ?? $penjualan->jumlah}}">
            </div>
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="position-relative row form-group"><label for="total" class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
                <input type="text" name="total" id="total" class="form-control @error('total') is-invalid @enderror" placeholder="Total pembayaran"  value="{{old('total') ?? $penjualan->total}}">
            </div>
            @error('total')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div> --}}

        <div class="position-relative row form-check">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-secondary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
