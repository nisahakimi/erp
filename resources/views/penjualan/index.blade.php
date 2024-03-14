@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header border-0">
        <div class="py-4 d-flex justify-content-end align-items-center">
            <h3 class="mr-auto">Data Penjualan</h3>
            <a href="{{route('penjualans.create')}}" class="btn btn-primary">
                Tambah Data Penjualan
            </a>
        </div>
    </div>

    @if(session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{session()->get('pesan')}}
        </div>
    @endif

    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Pembayaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($penjualans as $penjualan)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$penjualan->pelanggan->nama}}</td>
                    <td>{{$penjualan->tanggal_penjualan}}</td>
                    <td>{{$penjualan->produk->nama_produk}}</td>
                    <td>{{$penjualan->produk->harga}}</td>
                    <td>{{$penjualan->jumlah}}</td>
                    <td>{{$penjualan->produk->harga * $penjualan->jumlah}}</td>
                    <td>
                        <form action="{{route('penjualans.destroy',['penjualan'=>$penjualan->id])}}" method="POST" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                        </form>
                        <a href="{{route('penjualans.edit',$penjualan->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @empty
                <td colspan="6" class="text-center">Tidak ada data!</td>
            @endforelse
        </tbody>
      </table>
    </div>
    <!-- Card footer -->
    <div class="card-footer py-4">
      <nav aria-label="...">
        <ul class="pagination justify-content-end mb-0">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">
              <i class="fas fa-angle-left"></i>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">
              <i class="fas fa-angle-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
@endsection
