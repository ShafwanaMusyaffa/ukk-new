@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Lelang Card -->
            <div class="col-sm-6 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Lelang Berlangsung</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$lelang->count()}}</h6>
                      <span class="text-muted small pt-2 ps-1">Lelang Sedang Berjalan</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Lelang Card -->

            <!-- Penggunars Card -->
            <div class="col-sm-6 col-md-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Pengguna</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$user}}</h6>
                      <span class="text-muted small pt-2 ps-1">Total Pengguna</span>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Pengguna Card -->

            <!-- Tertinggi Card -->
            <div class="col-sm-12 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Produk</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$asset->count()}}</h6>
                      <span class="text-muted small pt-2 ps-1">Total Produk Ditambahkan</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Tertinggi Card -->


          </div>
        </div><!-- End columns -->

        <!-- Penawaran Terbaru -->
        <div class="col-lg-12">
          <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">
              <h5 class="card-title">Penawaran Terbaru</h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Penawaran</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="#" class="link-dark fw-bold">Septian Padli</a></td>
                    <td><a href="#" class="link-dark fw-bold">SPBU</a></td>
                    <td>Rp. <span class="harga">20000000</span></td>
                    <td class="">2022-02-13</td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Top Selling -->
      </div>
    </section>
@endsection
