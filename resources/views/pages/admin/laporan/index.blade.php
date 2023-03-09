@extends('layouts.admin')
@section('content')
    <section class="p-4">
        <h3>Data Laporan Produk</h3>
        <a href="{{ route('laporan.download') }}">
            <button class="btn btn-sm btn-primary" style="width: fit-content">
                <span>Generate Laporan</span>
            </button>
        </a>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center my-5">
                <h2 class="heading-section text-center" style="width: 100%">
                    LAPORAN PELELANGAN
                </h2>
                <p class="heading-section mt-3 fw-semibold me-4 text-end">{{ $date = now()->format('d-m-Y') }}</p>
            </div>

            <h4 class="mb-4">Data Lelang</h4>
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-primary text-light">
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
                    @foreach ($lelangs as $lelang)
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
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
    </section>
@endsection
