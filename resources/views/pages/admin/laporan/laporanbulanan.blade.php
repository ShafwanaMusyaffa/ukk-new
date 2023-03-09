<!DOCTYPE html>
<html lang="en">

<head>
    <title>LAPORAN PELELANGAN</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    /> -->
    <link href="/asset/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center my-5">
                <h2 class="heading-section text-center" style="width: 100%">
                    LAPORAN PELELANGAN
                </h2>
                <h5 class=" text-center">Bulan April</h5>
                {{-- <p class="heading-section mt-3 fw-semibold me-4 text-end">{{ $date = now()->format('d-m-Y') }}</p> --}}
            </div>

            {{-- <p class="mb-4">Data Lelang</p> --}}
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-primary text-light">
                        <th>ID Lelang</th>
                        <th>Jumlah Produk</th>
                        <th>Tanggal Lelang</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Total penawaran</th>
                        <th>Pemenang</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($lelangs as $lelang)
                        @if ($lelang->status == false && $lelang->pemenang_id != null)
                            <tr>
                                <td>{{ $lelang->id }}</td>
                                <td>{{ $lelang->asset->game }}</td>
                                <td>{{ $lelang->created_at }}</td>
                                <td>{{ $lelang->waktu_berakhir }}</td>
                                <td>Rp. {{ number_format($lelang->harga_awal, 2, ',', '.') }}</td>
                                <td>Rp. {{ number_format($lelang->harga_sekarang, 2, ',', '.') }}</td>
                                <td>{{ $lelang->pemenang->nama_lengkap }}</td>
                            </tr>
                        @endif
                    @endforeach --}}
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>20-2-2022</td>
                        <td>Lemari</td>
                        <td>Rp.1.000.000,00</td>
                        <td>5</td>
                        <td>Aldi</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </section>

</body>

</html>
