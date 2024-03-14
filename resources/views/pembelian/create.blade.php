@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body"><h3 class="card-title">Form Pembelian</h3>
        <form action="{{ route('pembelians.store') }}" method="POST" id="pembelian" name="pembelian">
            @csrf
            <div class="position-relative row form-group"><label for="nofaktur" class="col-sm-2 col-form-label">NoFaktur</label>
                <div class="col-sm-10">
                    <input type="text" name="nofaktur" id="nofaktur" class="form-control @error('nofaktur') is-invalid @enderror" placeholder="No Faktur Pembelian"  value="{{old('nofaktur')}}">
                </div>
                @error('nofaktur')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="position-relative row form-group">
                <label for="id_karyawan" class="col-sm-2 col-form-label">Nama Karyawan
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-8">
                    <select class="mb-2 form-control @error('id_karyawan') is-invalid @enderror" name="id_karyawan" id="id_karyawan">
                        <option value="" disabled selected>Pilih karyawan</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{$karyawan->id}}"> {{$karyawan->nama}} </option>
                        @endforeach
                    </select>
                </div>
                @error('id_karyawan')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
                 <div class="col-sm-2">
                    <a href="{{ route('karyawans.create') }}" class="btn btn-icon  btn-success" data-toggle="tooltip" title="Data karyawan tidak ada? Tambahkan data"><i
                            class="fas fa-plus"></i></a>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="id_bahan" class="col-sm-2 col-form-label">Nama Bahan
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-8">
                    <select class="mb-2 form-control @error('id_bahan') is-invalid @enderror" name="id_bahan" id="id_bahan">
                        <option value="" disabled selected>Pilih Bahan</option>
                        @foreach ($bahans as $bahan)
                            <option value="{{$bahan->id}}"> {{$bahan->nama_bahan}} </option>
                        @endforeach
                    </select>
                </div>
                @error('id_karyawan')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
                 <div class="col-sm-2">
                    <a href="{{ route('bahans.create') }}" class="btn btn-icon  btn-success" data-toggle="tooltip" title="Data bahan tidak ada? Tambahkan data"><i
                            class="fas fa-plus"></i></a>
                </div>
            </div>

                <div class="position-relative row form-group"><label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga bahan"  value="{{old('harga')}}">
                    </div>
                    @error('harga')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="position-relative row form-group"><label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="text" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Jumlah bahan"  value="{{old('jumlah')}}">
                    </div>
                    @error('jumlah')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="position-relative row form-group"><label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <input type="text" name="satuan" id="satuan" class="form-control" value="{{old('jumlah') ?? $bahan->satuan}} " readonly>
                    </div>
                </div>

                {{-- <div class="position-relative row form-group"><label for="total" class="col-sm-2 col-form-label">Total
                    <i class="text-danger">*</i>
                </label>
                    <div class="col-sm-10">
                        <input name="total" id="total" placeholder="Total Bayar" type="text" class="form-control @error('total') is-invalid @enderror"  value="{{ old('total')}}" readonly>
                    </div>
                    @error('total')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

            <div class="position-relative row form-group"><label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                <div class="col-sm-6">
                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal pembelian bahan"  value="{{old('tanggal')}}">
                </div>
                @error('tanggal')
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

{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>

<script type="text/javascript">
    // $('totalpembelian').keyup(function(){
    //     var harga = parseInt($("#harga").val());
    //     var jumlah = parseInt($('#jumlah').val());

    //     var total = harga * jumlah;
    //     $("#total").attr("value",total);
    // });

    // function totalPembelian(){
    //     var harga = parseFloat(document.fform.harga.value);
    //     var jumlah = parseFloat(document.fform.jumlah.value);

    //     var total = harga * jumlah;

    //     document.pembelian.total.value = total;
    // }
</script> --}}
@endsection
