@extends('layouts.app')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h4>Data Pemasok</h4>
      <div class="card-header-action">
        <a href="{{route('pemasoks.create')}}" class="btn btn-primary">
            Tambah Data Pemasok
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
                  <th>Alamat</th>
                  <th>No.HP</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($pemasoks as $pemasok)
                      <tr>
                          <th>{{$loop->iteration}}</th>
                          <td>{{$pemasok->nama}}</a></td>
                          <td>{{$pemasok->alamat}}</td>
                          <td>{{$pemasok->notelp}}</td>
                          <td>{{$pemasok->email}}</td>
                          <td>
                            <a href="{{route('pemasoks.edit',['pemasok'=>$pemasok->id])}}" class="btn btn-icon icon-left btn-success"><i class="far fa-edit"></i>Edit</a>
                              <form action="{{route('pemasoks.destroy',['pemasok'=>$pemasok->id])}}" method="POST" style="display:inline">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger ml-3"><i
                                    class="far fa-trash-alt"></i>Hapus</button>
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
