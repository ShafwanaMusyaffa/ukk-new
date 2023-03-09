@extends('layouts.app')

@section('content')
    <section class="py-5">
      <div class="container pt-5">
        @if(count($lelang) > 0)
        <div class="row g-4">
            @foreach($lelang as $lelang)
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="card shadow-sm">
                    <div class="w-100 ratio ratio-1x1 overflow-hidden">
                        <span>
                        <img src="{{ asset('storage/image/'.$lelang->asset->image) }}" alt="{{ $lelang->asset->game }}" class="h-100">
                        </span>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-warning mb-2">
                        <i class="bi bi-clock me-1"></i>
                        {{ $lelang->waktu_berakhir->format('d M, Y') }}
                        </span>
                        <a href="{{ url('/lelang/' . $lelang->id) }}" class="text-black text-decoration-none">
                        <h4 class="fw-semibold">{{ $lelang->asset->game }}</h4>
                        </a>
                        <p class="mb-0">Penawaran tertinggi</p>
                        <p class="mb-0 fs-5 fw-semibold pb-3">Rp. {{ number_format($lelang->harga_sekarang, 2, ',', '.') }}</p>
                        <a href="{{ url('/lelang/' . $lelang->id) }}" class="btn w-100 btn-success">Lelang</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <p class="text-center">Belum ada lelang yang tersedia.</p>
        @endif
      </div>
    </section>
@endsection


{{-- @section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card card-solid mt-2">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($lelang as $lelang)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            {{ $lelang->asset->user->nama_lengkap }}
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>{{ $lelang->asset->game }}</b></h2>
                                    <p class="text-muted text-sm"><b>IGN: </b> {{ $lelang->asset->identifier }}<br><b>Deskripsi: </b> {{ $lelang->asset->deskripsi }}</p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> No Telp: {{ $lelang->asset->user->no_telp }}</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="{{ url('/lelang/' . $lelang->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-info"></i> Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                </ul>
            </nav>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection --}}
