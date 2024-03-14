@extends('layouts.app')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h4>Data Produk</h4>
            <div class="card-header-action">
                <a href="{{ route('produks.create') }}" class="btn btn-primary">
                    Tambah Data Produk
                </a>
            </div>
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
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produks as $produk)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td><a href="{{ url('produks/' . $produk->id) }}">{{ $produk->nama_produk }}</a></td>
                                <td>{{ $produk->kategoriproduk->nama_kategori }}</td>
                                <td>{{ $produk->harga }}</td>
                                <td>{{ $produk->deskripsi }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td style="display:inline">
                                    <a data-target="#tambahstokModal" data-toggle="modal" href="#tambahstokModal" class="btn btn-icon btn-dark">
                                        <i class="far fa-edit"></i></a>
                                    <a href="{{ route('produks.edit', ['produk' => $produk->id]) }}"
                                        class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('produks.destroy', ['produk' => $produk->id]) }}" method="POST"
                                        style="display:inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-danger ml-3"><i
                                                class="far fa-trash-alt"></i></button>
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

<div class="modal fade" id="tambahstokModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Stok {{ $produk->nama_produk }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produks.tambahstok', ['produk' => $produk->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="position-relative row form-group"><label for="nama_produk"
                            class="col-sm-2 col-form-label">Nama Produk
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('stok') ?? $produk->nama_produk }} " readonly>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="stok" class="col-sm-2 col-form-label">Stok
                            <i class="text-danger">*</i>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="stok" id="stok"
                                class="form-control @error('stok') is-invalid @enderror" placeholder="Jumlah stok produk" value="{{ old('stok') }} ">
                        </div>
                        @error('stok')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="position-relative row form-check">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-secondary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
