<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{--
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    --}}

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">

    <title>Laporan Pembelian</title>
</head>

<body>
    <div class="text-center">
        <center>
            <h5>TOKO SULAMAN DAN BORDIRAN PUTRI AYU</h5>
            <h6>Jl. Adinegoro No.7E, Aur Kuning, Kec. Aur Birugo Tigo Baleh, <br />Kota Bukittinggi, Sumatera Barat
                26181</h6>
        </center>
    </div>

    <hr><br />

    <div class="text-center">
        <center>
            <h6>Laporan Pembelian Per Bulan</h6>
            <h6>Periode ({{$date[0]}} - {{ $date[1]}}) </h6>
        </center>
        <br/>
        <table class="table table-bordered">
            <thead>
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

                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center">
        {{now()->format('d/m/Y')}}
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>

</body>

</html>
