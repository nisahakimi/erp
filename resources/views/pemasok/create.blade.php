@extends('layouts.app')

@section('content')
<div class="card-body"><h2 class="card-title">Form Pemasok</h2>
    <form action="{{ route('pemasoks.store') }}" method="POST">
        @csrf
        <div class="position-relative row form-group"><label for="nama" class="col-sm-2 col-form-label">Nama
            <i class="text-danger">*</i>
        </label>
            <div class="col-sm-10">
                <input name="nama" id="nama" placeholder="Nama Pemasok" type="text" class="form-control @error('nama') is-invalid @enderror"  value="{{ old('nama')}}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="position-relative row form-group"><label for="alamat" class="col-sm-2 col-form-label">Alamat
            <i class="text-danger">*</i>
        </label>
            <div class="col-sm-10">
            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" >{{old('alamat')}}</textarea>
            </div>
            @error('alamat')
                <div class="text-danger">{{$message}}</div>
             @enderror
        </div>

        <div class="position-relative row form-group"><label for="notelp" class="col-sm-2 col-form-label">No.HP
            <i class="text-danger">*</i>
        </label>
            <div class="col-sm-10">
                <input name="notelp" id="notelp" placeholder="No.HP Pemasok" type="text" class="form-control  @error('notelp') is-invalid @enderror"  value="{{ old('notelp')}}">
            </div>
            @error('notelp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="position-relative row form-group"><label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Pemasok"  value="{{old('email')}}">
            </div>
            @error('email')
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
@endsection
