@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body"><h3 class="card-title">Form Edit Pembelian</h3>
        <form action="{{ route('pembelians.update',['pembelian'=>$pembelian->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="position-relative row form-group"><label for="nofaktur" class="col-sm-2 col-form-label">NoFaktur</label>
                <div class="col-sm-10">
                    <input type="text" name="nofaktur" id="nofaktur" class="form-control @error('nofaktur') is-invalid @enderror" placeholder="No Faktur Pembelian"  value="{{old('nofaktur') ?? $pembelian->nofaktur}}">
                </div>
                @error('nofaktur')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="position-relative row form-group">
                <label for="id_karyawan" class="col-sm-2 col-form-label">Nama Karyawan
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-10">
                    <select class="mb-2 form-control @error('id_karyawan') is-invalid @enderror" name="id_karyawan" id="id_karyawan">
                        <option value="" disabled selected>Pilih karyawan</option>
                        @foreach ($karyawans as $karyawan)
                            @if ($karyawan->id == $pembelian->id_karyawan)
                                <option value="{{$karyawan->id}}" selected="selected">{{$karyawan->nama}}</option>
                            @else
                            <option value="{{$karyawan->id}}"> {{$karyawan->nama}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @error('id_karyawan')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
            </div>

            <div class="position-relative row form-group">
                <label for="id_bahan" class="col-sm-2 col-form-label">Nama Bahan
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-10">
                    <select class="mb-2 form-control @error('id_bahan') is-invalid @enderror" name="id_bahan" id="id_bahan">
                        <option value="" disabled selected>Pilih Bahan</option>
                        @foreach ($bahans as $bahan)
                            @if ($bahan->id == $pembelian->id_bahan)
                                <option value="{{$bahan->id}}" selected="selected">{{$bahan->nama_bahan}}</option>
                            @else
                            <option value="{{$bahan->id}}"> {{$bahan->nama_bahan}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @error('id_karyawan')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
            </div>

            <div class="position-relative row form-group"><label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga bahan"  value="{{old('harga') ?? $pembelian->harga}}">
                </div>
                @error('harga')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="position-relative row form-group"><label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Jumlah bahan"  value="{{old('jumlah') ?? $pembelian->jumlah}}">
                </div>
                @error('jumlah')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="position-relative row form-group"><label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal pembelian bahan"  value="{{old('tanggal') ?? $pembelian->tanggal}}">
                </div>
                @error('tanggal')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            {{-- <div class="position-relative row form-group"><label for="total" class="col-sm-2 col-form-label">Total
                <i class="text-danger">*</i>
            </label>
                <div class="col-sm-10">
                    <input name="total" id="total" placeholder="Total Bayar" type="text" class="form-control @error('total') is-invalid @enderror"  value="{{ old('total') ?? $pembelian->total}}">
                </div>
                @error('total')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
