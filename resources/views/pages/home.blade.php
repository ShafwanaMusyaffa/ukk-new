@extends('layouts.app')

@section('content')
    <section class="py-5">
      <div class="container pt-5">
        <div class="d-flex justify-content-between align-items-center">
          <h1 class="fw-bold mb-4">Lelang Yang Berlangsung</h1>
            <a href="" class="btn btn-outline-primary">Lihat Lebih Banyak <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-4">
          <div class="col-6 col-md-4 col-xl-3">
            <div class="card shadow-sm">
              <div class="w-100 ratio ratio-1x1 overflow-hidden">
                <span>
                  <img src="/asset/img/card.jpg" alt="" class="h-100">
                </span>
              </div>
              <div class="card-body">
                <span class="badge bg-warning mb-2">
                  <i class="bi bi-clock me-1"></i>
                  1 Hari
                </span>
                <a href="" class="text-black text-decoration-none">
                  <h4 class="fw-semibold">Lelang Laely</h4>
                </a>
                <p class="mb-0">Penawaran tertinggi</p>
                <p class="mb-0 fs-5 fw-semibold">Rp. <span class="harga">20000</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
