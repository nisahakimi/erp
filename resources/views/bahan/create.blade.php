@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Form Bahan</h3>
            <form action="{{ route('bahans.store') }}" method="POST">
                @csrf
                <div class="position-relative row form-group"><label for="nama" class="col-sm-2 col-form-label">Nama Bahan
                        <i class="text-danger">*</i>
                    </label>
                    <div class="col-sm-10">
                        <input name="nama_bahan" id="nama_bahan" placeholder="Nama Bahan" type="text"
                            class="form-control @error('nama_bahan') is-invalid @enderror" value="{{ old('nama_bahan') }}">
                        @error('nama_bahan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="position-relative row form-group">
                    <label for="pemasok" class="col-sm-2 col-form-label">Pemasok
                        <i class="text-danger">*</i>
                    </label>
                    <div class="col-sm-8">
                        <select class="mb-2 form-control @error('id_pemasok') is-invalid @enderror" name="id_pemasok"
                            id="id_pemasok">
                            <option value="" disabled selected>Pilih Pemasok</option>
                            @foreach ($pemasoks as $pemasok)
                                <option value="{{ $pemasok->id }}"> {{ $pemasok->nama }} </option>
                            @endforeach
                        </select>
                    </div>
                    @error('id_pemasok')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-sm-2">
                        <a href="{{ route('pemasoks.create') }}" class="btn btn-icon  btn-success" data-toggle="tooltip" title="Data pemasok tidak ada? Tambahkan data"><i
                                class="fas fa-plus"></i></a>
                    </div>
                </div>

                <div class="position-relative row form-group"><label for="stok" class="col-sm-2 col-form-label">Jumlah stok
                        bahan
                    </label>
                    <div class="col-sm-10">
                        <input name="stok" id="stok" placeholder="Jumlah stok bahan yang ada" type="text"
                            class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}">
                        @error('stok')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="position-relative row form-group"><label for="satuan" class="col-sm-2 col-form-label">Satuan
                        bahan
                    </label>
                    <div class="col-sm-10">
                        <input name="satuan" id="satuan" placeholder="Satuan bahan" type="text"
                            class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan') }}">
                        @error('satuan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="position-relative row form-check">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-icon icon-left btn-success"><i
                                class="fas fa-check"></i>Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
