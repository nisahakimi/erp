@extends('layouts.app')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h4>Data Pelanggan</h4>
            <div class="card-header-action">
                <a href="{{ route('pelanggans.create') }}" class="btn btn-primary">
                    Tambah Data Pelangan
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
                            <th>Jenis Kelamin</th>
                            <th>No.HP</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggans as $pelanggan)
                            <tr>
                                <th style="width:5%">{{ $loop->iteration }}</th>
                                <td style="width:10%">{{ $pelanggan->nama }}</td>
                                <td style="width:5%">{{ $pelanggan->jenis_kelamin }}</td>
                                <td style="width:10%">{{ $pelanggan->notelp }}</td>
                                <td style="width:10%">{{ isset($pelanggan->email) ? $pelanggan->email : 'Tidak ada email'}}</td>
                                <td style="width:40%">{{ $pelanggan->alamat }}</td>
                                <td style="width:20%">
                                    <a href="{{ route('pelanggans.edit', ['pelanggan' => $pelanggan->id]) }}"
                                        class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('pelanggans.destroy', ['pelanggan' => $pelanggan->id]) }}"
                                        method="POST" style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-danger"><i
                                            class="far fa-trash-alt"></i></button>
                                    </form>

                                    {{-- <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href=""
                                                {{ route('pelanggans.destroy', ['pelanggan' => $pelanggan->id]) }}>Hapus</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> --}}
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
