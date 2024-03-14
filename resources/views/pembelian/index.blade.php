@extends('layouts.app')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h4>Data Pembelian</h4>
      <div class="card-header-action">
        <a href="{{route('pembelians.create')}}" class="btn btn-primary">
            Tambah Data Pembelian
        </a>
      </div>
    </div>

    @if(session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{session()->get('pesan')}}
        </div>
    @endif

    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama Karyawan</th>
                  <th>Bahan</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($pembelians as $pembelian)
                      <tr>
                          <th>{{$loop->iteration}}</th>
                          <td>{{$pembelian->karyawan->nama}}</td>
                          <td>{{$pembelian->bahan->nama_bahan}}</td>
                          <td>{{$pembelian->harga}}</td>
                          <td>{{$pembelian->jumlah}}</td>
                          <td>{{$pembelian->tanggal}}</td>
                          <td>{{$pembelian->harga * $pembelian->jumlah}}</td>
                          <td>
                            <a href="{{route('pembelians.edit',['pembelian'=>$pembelian->id])}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('pembelians.cetakfaktur',['pembelian'=>$pembelian->id])}}" class="btn btn-primary">Cetak</a>
                              <form action="{{route('pembelians.destroy',['pembelian'=>$pembelian->id])}}" method="POST" style="display:inline">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                              </form>

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
