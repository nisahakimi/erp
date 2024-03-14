@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Edit Karyawan</h3>
            <form action="{{ route('karyawans.update', ['karyawan' => $karyawan->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="position-relative row form-group"><label for="nama" class="col-sm-2 col-form-label">Nama
                        <i class="text-danger  ">*</i>
                    </label>
                    <div class="col-sm-10">
                        <input name="nama" id="nama" placeholder="Nama Karyawan" type="text"
                            class="form-control @error('nama') is-invalid @enderror "
                            value="{{ old('nama') ?? $karyawan->nama }}">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
                                    value="L"
                                    {{ (old('jenis_kelamin') ?? $karyawan->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jenis_kelamin">
                                    Laki - laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
                                    value="P"
                                    {{ (old('jenis_kelamin') ?? $karyawan->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jenis_kelamin">
                                    Perempuan
                                </label>
                            </div>
                            @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <div class="position-relative row form-group"><label for="notelp" class="col-sm-2 col-form-label">No.HP
                        <i class="text-danger">*</i>
                    </label>
                    <div class="col-sm-10">
                        <input name="notelp" id="notelp" placeholder="No.HP Karyawan" type="text"
                            class="form-control @error('notelp') is-invalid @enderror"
                            value="{{ old('notelp') ?? $karyawan->notelp }}">
                    </div>
                    @error('notelp')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="position-relative row form-group"><label for="email"
                        class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email Karyawan" value="{{ old('email') ?? $karyawan->email }}">
                    </div>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="position-relative row form-group">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat
                        <i class="text-danger">*</i>
                    </label>
                    <div class="col-sm-10">
                        <textarea name="alamat" id="alamat"
                            class="form-control  @error('alamat') is-invalid @enderror">{{ old('alamat') ?? $karyawan->alamat }}
                        </textarea>
                    </div>
                    @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
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
