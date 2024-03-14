@extends('layouts.app')

@section('content')
<div class="card-body"><h2 class="card-title">Form Pengeluaran</h2>
    <form action="{{ route('pengeluarans.update',['pengeluaran'=>$pengeluaran->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="position-relative row form-group">
            <label for="id_karyawan" class="col-sm-2 col-form-label">Nama Karyawan
                <i class="text-danger">*</i>
            </label>
            <div class="col-sm-10">
                <select class="mb-2 form-control @error('id_karyawan') is-invalid @enderror" name="id_karyawan" id="id_karyawan">
                    <option value="" disabled selected>Pilih karyawan</option>
                    @foreach ($karyawans as $karyawan)
                        @if ($karyawan->id == $pengeluaran->id)
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
            <label for="id_jenispengeluaran" class="col-sm-2 col-form-label">Jenis Pengeluaran
                <i class="text-danger">*</i>
            </label>
            <div class="col-sm-10">
                <select class="mb-2 form-control @error('id_jenispengeluaran') is-invalid @enderror" name="id_jenispengeluaran" id="id_jenispengeluaran">
                    <option value="" disabled selected>Pilih jenis pengeluaran</option>
                    @foreach ($jenispengeluarans as $jenispengeluaran)
                    @if ($jenispengeluaran->id == $pengeluaran->id)
                        <option value="{{$jenispengeluaran->id}}" selected="selected">{{$jenispengeluaran->jenis_pengeluaran}}</option>
                    @else
                        <option value="{{$jenispengeluaran->id}}"> {{$jenispengeluaran->jenis_pengeluaran}} </option>
                    @endif
                    @endforeach
                </select>
            </div>
            @error('id_karyawan')
                <div class="text-danger">{{$message}}</div>
             @enderror
        </div>

        <div class="position-relative row form-group"><label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pengeluaran</label>
            <div class="col-sm-10">
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal Pengeluaran"  value="{{old('tanggal') ?? $pengeluaran->tanggal}}">
            </div>
            @error('tanggal')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="position-relative row form-group"><label for="total" class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
                <input type="text" name="total" id="total" class="form-control @error('total') is-invalid @enderror" placeholder="Total pembayaran"  value="{{old('total') ?? $pengeluaran->total}}">
            </div>
            @error('total')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="position-relative row form-group">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan Pengeluaran
                <i class="text-danger">*</i>
             </label>
            <div class="col-sm-10">
            <textarea name="keterangan" id="keterangan" class="form-control  @error('keterangan') is-invalid @enderror">{{old('keterangan') ?? $pengeluaran->keterangan}}</textarea>
            </div>
            @error('keterangan')
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
