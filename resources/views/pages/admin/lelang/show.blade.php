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
        @if(!$lelang->status == false)
        <div class="card-footer">
        <h5 class="text-center mb-0">Pemenang: {{ $lelang->logs->sortByDesc('harga')->first()->user->nama_lengkap }}</h5>
        </div>
        @endif


    </section>
@endsection
