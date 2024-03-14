@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body"><h3 class="card-title">Edit Data Kategori</h3>
        <form action="{{ route('kategoriproduks.update',['kategoriproduk'=>$kategoriproduk->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="position-relative row form-group"><label for="nama_kategori" class="col-sm-2 col-form-label">Kategori
                <i class="text-danger">*</i>
            </label>
                <div class="col-sm-10">
                    <input name="nama_kategori" id="nama_kategori" placeholder="Kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror"  value="{{ old('nama_kategori') ?? $kategoriproduk->nama_kategori}}">
                    @error('nama_kategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-secondary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
