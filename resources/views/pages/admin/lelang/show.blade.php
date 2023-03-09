@extends('layouts.app')


@section('content')
    <section class="py-5">
      <div class="container pt-5">
        <div class="card border-0 shadow-sm mb-3">
          <div class="card-body row">
            <div class="col-12 col-md-4">
              <div class="w-100 ratio ratio-1x1 overflow-hidden rounded-3">
                <div class="w-100">
                  <img src="{{ asset('storage/image/'.$lelang->asset->image) }}" alt="{{ $lelang->asset->game }}" class="h-100">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-8">
              <h1 class="fw-bold">{{ $lelang->asset->game }}</h1>
              <span class="badge bg-warning mb-2">
                <i class="bi bi-clock me-1"></i>
                {{ $lelang->waktu_berakhir->format('d M Y') }}
              </span>
              <p class="mb-0 text-black">Penawaran Tertinggi</p>
              <h4 class="fw-bold">Rp. {{ number_format($lelang->harga_sekarang, 2, ',', '.') }}</h4>
              <p class="mb-0">
                {{ $lelang->asset->deskripsi }}
              </p>
              <div class="mt-4">
                <h3 class="mb-2">Lelang Sekarang</h3>
                    @if(Auth::user()->id == $lelang->user->id)
                    <form action="{{ route('lelang.akhiri', $lelang->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" type="submit" onclick="confirm('Yakin ingin mengakhiri lelang?')"> Akhiri lelang</button>
                    </form>

                    @else
                        <form action="{{ route('lelang.update', $lelang->id) }}" class="d-flex w-100 justify-content-between gap-2" method="post">
                            @csrf
                            @method('put')

                            <input type="number" class="form-control" id="harga_awal" name="harga_tawaran" placeholder="Rp. 20000">
                            <button type="submit" class="btn btn-primary">Tawarkan</button>
                        </form>
                    @endif

              </div>
            </div>

          </div>
        </div>
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h3>Riwayat Penawaran</h3>
            @if($lelang->logs->count() > 0)
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Penawaran</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($lelang->logs->sortByDesc('harga') as $log)

                    <tr>
                    <td>{{ $log->user->nama_lengkap }}</td>
                    <td>{{ $log->created_at->format('d M Y, h:i') }}</td>
                    <td class="fw-bold">Rp. {{ number_format($log->harga, 2, ',', '.') }}</span></td>
                    </tr>

                    @endforeach
                </tbody>
                </table>
            @else
                <p class="text-center">Belum ada penawaran.</p>
            @endif
          </div>
        </div>
      </div>
    </section>
@endsection
@section('content-header', 'Detail Lelang')


@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Harga awal</span>
                                <span class="info-box-number text-center text-muted mb-0">Rp. {{ number_format($lelang->harga_awal, 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Harga sekarang</span>
                                <span class="info-box-number text-center text-muted mb-0">Rp. {{ number_format($lelang->harga_sekarang, 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Tanggal berakhir</span>
                                <span class="info-box-number text-center text-muted mb-0">{{ $lelang->waktu_berakhir->format('d M, Y') }}<span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="timeline">
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-blue">{{ $lelang->created_at->format('d M, Y') }}</span>
                            </div>
                            @php
                            $time = $lelang->created_at->format('d M, Y')
                            @endphp
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-exclamation bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> {{ $lelang->created_at->format('H:i') }}</span>
                                    <h3 class="timeline-header"><a href="{{ url('/u/' . $lelang->user->id) }}">{{ $lelang->user->nama_lengkap }}</a> Memulai Lelang</h3>
                                    <div class="timeline-body">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                    </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            @foreach($lelang->logs as $log)
                            <div class="time-label">
                                <span class="bg-green">{{ $log->created_at->format('d M, Y') }}</span>
                            </div>
                            <div>
                                <i class="fas fa-comments bg-green"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i>{{ $log->created_at->format('H:i') }}</span>
                                    <h3 class="timeline-header no-border"><a href="{{ url('/u/' . $log->user->id) }}">{{ $log->user->nama_lengkap }}</a> Menawar seharga {{ $log->harga }}</h3>
                                </div>
                            </div>
                            @endforeach
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            @if(!$lelang->status)
                            @if($time != $lelang->updated_at->format('d M, Y'))
                            <div class="time-label">
                                <span class="bg-red">{{ $log->created_at->format('d M, Y') }}</span>
                            </div>
                            @endif
                            <div>
                                <i class="fas fa-exclamation bg-red"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i>{{ $lelang->updated_at->format('H:s') }}</span>
                                    <h3 class="timeline-header no-border"><a href="{{ url('/u/' . $lelang->user->id) }}">{{ $lelang->user->nama_lengkap }}</a> Mengakhiri lelang</h3>
                                </div>
                            </div>
                            @endif
                            <!-- END timeline item -->
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <h3 class="text-secondary"><i class="fas fa-paint-brush"></i>{{ $lelang->asset->game }}</h3>
                <p class="text-muted">{{ $lelang->asset->deskripsi }}</p>

                <h5 class="mt-2">In Game Name</h5>
                <span class="d-block text-muted">{{ $lelang->asset->identifier }}</span>

                <h5 class="mt-3">Genre Game</h5>
                <ul class="list-unstyled text-muted">
                    @foreach($lelang->asset->genres as $genre)
                    <li>{{ $genre->genre }}</li>
                    @endforeach
                </ul>
                <div class="text-center mt-5 mb-3">
                    @if(Auth::user()->id == $lelang->user->id)
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-account-modal"><i class="fas fa-exclamation"></i> Akhiri lelang</button>
                    @else
                    <a href="{{ url('/lelang/' . $lelang->id . '/tawar') }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i> Tawar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<div class="modal fade" id="delete-account-modal">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Yakin ingin mengakhiri lelang?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Aksi mengakhiri lelang tidak bisa di urungkan&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                <form action="{{ route('lelang.akhiri', $lelang->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Akhiri</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
