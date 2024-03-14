@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body"><h3 class="card-title">Form Pesanan</h3>
        <form action="{{ route('pesanans.store') }}" method="POST">
            @csrf

            <div class="position-relative row form-group"><label for="nofaktur" class="col-sm-2 col-form-label">Jumlah produk
                <i class="text-danger">*</i>
            </label>
                <div class="col-sm-10">
                    <input name="nofaktur" id="nofaktur" placeholder="No Faktur Pesanan" type="text" class="form-control @error('nofaktur') is-invalid @enderror"  value="{{ old('nofaktur')}}">
                </div>
                @error('nofaktur')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="position-relative row form-group">
                <label for="id_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-9">
                    <select class="mb-2 form-control @error('id_pelanggan') is-invalid @enderror" name="id_pelanggan" id="id_pelanggan">
                        <option value="" disabled selected>Pilih pelanggan</option>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{$pelanggan->id}}"> {{$pelanggan->nama}} </option>
                        @endforeach
                    </select>
                </div>
                @error('id_pelanggan')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
                 <div class="col-sm-1">
                    <a href="{{ route('pelanggans.create') }}" class="btn btn-icon  btn-success" data-toggle="tooltip" title="Data pelanggan tidak ada? Tambahkan data"><i
                            class="fas fa-plus"></i></a>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="id_kategoriproduk" class="col-sm-2 col-form-label">Kategori Produk
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-9">
                    <select class="mb-2 form-control @error('id_kategoriproduk') is-invalid @enderror" name="id_kategoriproduk" id="id_kategoriproduk">
                        <option value="" disabled selected>Pilih Kategori Produk</option>
                        @foreach ($kategoriproduks as $kategoriproduk)
                            <option value="{{$kategoriproduk->id}}"> {{$kategoriproduk->nama_kategori}} </option>
                        @endforeach
                    </select>
                </div>
                @error('id_kategoriproduk')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
                 <div class="col-sm-1">
                    <a href="{{ route('kategoriproduks.create') }}" class="btn btn-icon  btn-success" data-toggle="tooltip" title="Data kategori produk tidak ada? Tambahkan data"><i
                            class="fas fa-plus"></i></a>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi
                    {{-- <i class="text-danger">*</i> --}}
                 </label>
                <div class="col-sm-10">
                <textarea name="deskripsi" id="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror">{{old('deskripsi')}}</textarea>
                </div>
                @error('deskripsi')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
            </div>

            <div class="position-relative row form-group"><label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal"  value="{{old('tanggal')}}">
                </div>
                @error('tanggal')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="position-relative row form-group"><label for="harga" class="col-sm-2 col-form-label">Harga produk
                <i class="text-danger">*</i>
            </label>
                <div class="col-sm-10">
                    <input name="harga" id="harga" placeholder="Harga per produk yang dipesan" type="text" class="form-control @error('harga') is-invalid @enderror"  value="{{ old('harga')}}">
                </div>
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="position-relative row form-group"><label for="jumlah" class="col-sm-2 col-form-label">Jumlah produk
                <i class="text-danger">*</i>
            </label>
                <div class="col-sm-10">
                    <input name="jumlah" id="jumlah" placeholder="Jumlah produk" type="text" class="form-control @error('jumlah') is-invalid @enderror"  value="{{ old('jumlah')}}">
                </div>
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="position-relative row form-group"><label for="total" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="text" name="total" id="total" class="form-control @error('total') is-invalid @enderror" placeholder="Total pembayaran"  value="{{old('total')}}">
                </div>
                @error('total')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div> --}}

            <div class="position-relative row form-group"><label for="status_pembayaran" class="col-sm-2 col-form-label">Status Pembayaran</label>
                <div class="col-sm-10">
                    <input type="text" name="status_pembayaran" id="status_pembayaran" class="form-control @error('status_pembayaran') is-invalid @enderror" placeholder="Status pembayaran pesanan"  value="{{old('status_pembayaran')}}">
                </div>
                @error('status_pembayaran')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="position-relative row form-group"><label for="status_pesanan" class="col-sm-2 col-form-label">Status Pesanan</label>
                <div class="col-sm-10">
                    <select class="form-control @error('status_pesanan') is-invalid @enderror" name="status_pesanan" id="status_pesanan">
                        <option value="" disabled selected>Pilih Status Pesanan</option>
                        <option value="baru">Pesanan baru</option>
                        <option value="proses">Sedang diproses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                @error('status_pesanan')
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
