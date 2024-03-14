@extends('layouts.app')

@section('content')
<div class="card-body"><h2 class="card-title">Form Jenis Pengeluaran</h2>
    <form action="{{ route('jenispengeluarans.store') }}" method="POST">
        @csrf
        <div class="position-relative row form-group"><label for="nama_kategori" class="col-sm-2 col-form-label">Jenis
            <i class="text-danger">*</i>
        </label>
            <div class="col-sm-10">
                <input name="jenis_pengeluaran" id="jenis_pengeluaran" placeholder="Jenis" type="text" class="form-control @error('jenis_pengeluaran') is-invalid @enderror"  value="{{ old('jenis_pengeluaran')}}">
                @error('jenis_pengeluaran')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="position-relative row form-check">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-secondary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
