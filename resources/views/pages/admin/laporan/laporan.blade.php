<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LAPORAN PELELANGAN</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

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
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section" style="width: 100%">
              LAPORAN PELELANGAN
            </h2>
            <h2 class="heading-section">{{ $date = now()->format('d-m-Y') }}</h2>
          </div>
        </div>

            <h2>Data Lelang</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Lelang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Harga Awal</th>
                        <th>Harga Tertinggi</th>
                        <th>Pemenang</th>
                    </tr>
                </thead>
                <tbody>
                  @if(count($lelangs) == 0)
                      <tr>
                          <td colspan="7" class="text-center">Tidak ada data lelang</td>
                      </tr>
                  @else

                    @foreach($lelangs as $lelang)
                    @if($lelang->status == false && $lelang->pemenang_id != null)
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
                    @endforeach
                  @endif
                </tbody>
            </table>

      </div>
    </section>

  </body>
</html>
