tst
@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="mr-auto">Data Pesanan Yang Selesai</h3>
        </div>

        @if (session()->has('pesan'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session()->get('pesan') }}
                </div>
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Produk</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Deskripsi</th>
                            <th>Total Bayar</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanans as $pesanan)
                            @if (strtolower($pesanan->status_pesanan) == strtolower("selesai") && strtolower($pesanan->status_pembayaran) == strtolower("sudah dibayar"))
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $pesanan->pelanggan->nama }}</a></td>
                                    <td>{{ $pesanan->kategoriproduk->nama_kategori }}</td>
                                    <td>{{ $pesanan->tanggal }}</td>
                                    <td>{{ $pesanan->harga }}</td>
                                    <td>{{ $pesanan->jumlah }}</td>
                                    <td>{{ $pesanan->deskripsi }}</td>
                                    <td>{{ $pesanan->harga * $pesanan->jumlah }}</td>
                                    <td>{{ $pesanan->status_pembayaran }}</td>
                                    <td>{{ $pesanan->status_pesanan }}</td>
                                </tr>
                            @endif
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
    </div>
@endsection
