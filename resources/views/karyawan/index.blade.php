@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Data Karyawan</h4>
            <div class="card-header-action">
                <a href="{{ route('karyawans.create') }}" class="btn btn-primary">
                    Tambah Data Karyawan
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($karyawans as $karyawan)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td><a data-target="#detailModal" data-toggle="modal" href="#detailModal"
                                        id="nama">{{ $karyawan->nama }}</a></td>
                                <td>{{ $karyawan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki - laki' }}</td>
                                <td>{{ $karyawan->notelp }}</td>
                                <td>
                                    <a href="{{ route('karyawans.edit', $karyawan->id) }}"
                                        class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('karyawans.destroy', ['karyawan' => $karyawan->id]) }}" method="POST"
                                        style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-danger"><i
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


    {{-- <script type="text/javascript">
        $('#nama').click(function() {
            $(#detailModal).modal('show');
        })

    </script> --}}
@endsection
@forelse ($karyawans as $karyawan)
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data {{ $karyawan->nama }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">Nama: {{ $karyawan->nama }}</li>
                    <li class="list-group-item">Jenis Kelamin:
                        {{ $karyawan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki - laki' }}</li>
                    <li class="list-group-item">No. HP: {{ $karyawan->notelp }}</li>
                    <li class="list-group-item">Email:
                        {{ isset($karyawan->email) ? $karyawan->name : 'Tidak ada email' }}</li>
                    <li class="list-group-item">Alamat: {{ $karyawan->alamat }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@empty

@endforelse
