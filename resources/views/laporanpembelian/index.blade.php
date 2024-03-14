@extends('layouts.app')

@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h4>Laporan Pembelian</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('laporanpembelians.index') }}" method="get" class="form-inline">
                <div class="input-group float-right">
                    <input type="text" id="created_at" name="date" class="form-control">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Filter</button>
                    </div>

                    <a target="_blank" class="btn btn-primary ml-2" id="exportpdf">Export PDF</a>
                </div>
            </form>
            {{-- <br />
            <a href="{{ route('laporanpembelians.cetak') }}" class="btn btn-primary" target="_blank">CETAK PDF</a> --}}
        </div>

        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembelian</th>
                        <th>Bahan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembelians as $pembelian)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $pembelian->tanggal }}</td>
                            <td>{{ $pembelian->bahan->nama_bahan }}</td>
                            <td>{{ $pembelian->harga }}</td>
                            <td>{{ $pembelian->jumlah }}</td>
                            <td>{{ $pembelian->harga * $pembelian->jumlah }}</td>
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


    {{-- @if (session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('pesan') }}
        </div>
    @endif --}}



    </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    // $(document).ready(function(){
    //     let start = moment().startOf('month')
    //     let end = moment().endOf('month')

    //     $('#exportpdf').attr('href', '/administrator/reports/order/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

    //     $('#created_at').daterangepicker({
    //         startDate: start,
    //         endDate: end
    //     }, function(first, last){
    //         $('#exportpdf').attr('href', '/administrator/reports/order/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    //     })
    // })
</script>
@endsection
