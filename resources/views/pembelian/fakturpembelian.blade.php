<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Template CSS -->
      <link rel="stylesheet" href="/assets/css/style.css">
      <link rel="stylesheet" href="/assets/css/components.css">

    <title>Faktur Pembelian</title>
</head>
<body>
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h3>Faktur Pembelian</h3>
                         <div class="invoice-number">No.Faktur {{$pembelians->nofaktur}}</div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Pemasok:</strong><br>
                                {{$bahans->pemasok->nama}}<br>
                                {{$bahans->pemasok->alamat}}
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Tanggal Pembelian:</strong><br>
                                {{$pembelians->tanggal}}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    {{-- <div class="section-title">Order Summary</div> --}}
                    {{-- <p class="section-lead">All items here cannot be deleted.</p> --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th data-width="40">No</th>
                                <th>Bahan</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-right">Total</th>
                            </tr>
                            <tr>
                                @forelse ($pembelians as $pembelian)
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$bahans->nama_bahan}}</td>
                                    <td class="text-center">{{$pembelian->harga}}</td>
                                    <td class="text-center">{{$pembelian['jumlah']}}</td>
                                    <td class="text-right">{{$pembelian['harga'] * $pembelian['jumlah']}}</td>
                                @empty

                                @endforelse



                            </tr>
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-8">

                        </div>
                        <div class="col-lg-4 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Subtotal</div>
                                <div class="invoice-detail-value">$670.99</div>
                            </div>
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Shipping</div>
                                <div class="invoice-detail-value">$15</div>
                            </div>
                            <hr class="mt-2 mb-2">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">$685.99</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>
</html>
