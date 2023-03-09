@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
      <div>
        <h1>Data Produk</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.html">Produk</a></li>
            <li class="breadcrumb-item active">Lihat</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <a href="{{ route('assets.create') }}" class="btn btn-primary mb-4">Tambah Produk</a>
      @if($assets->count() > 0)
      <div class="row g-4">
        <!-- Loop -->
        @foreach($assets as $asset)

        <div class="col-10 col-sm-6 col-lg-4 mx-auto mx-sm-0">
            <div class="card shadow-sm mb-0">
                <div class="overflow-hidden ratio ratio-1x1 rounded-start">
                    <div>
                      <img src="{{ asset('storage/image/'.$asset->image) }}" class="h-100" alt="{{ $asset->game }}">
                    </div>
                </div>
                <div class="card-body">
                    <a class="text-decoration-none card-title fw-semibold fs-5 d-block mb-1 mt-2 py-0" href="/pages/client/detil.html">
                        {{ $asset->game }}
                    </a>
                    <p class="mb-1 fw-semibold"><i class="bi bi-tag-fill"></i> 
                        @foreach($asset->genres as $genre)
                            {{ $genre->genre }}
                        @endforeach
                    </p>
                    <p class="mb-1 fw-semibold"><i class="bi bi-r-circle-fill"></i> {{ $asset->identifier }}</p>
                    <p class="mb-1 fw-semibold">
                        @if($asset->lelang)
                            @if($asset->lelang->status)
                                <span class="btn btn-sm btn-outline-warning">Sedang di lelang</span>
                            @else
                                <span class="btn btn-sm btn-outline-success">Terjual</span>
                            @endif
                        @else
                            <span class="btn btn-sm btn-outline-danger">Belum dijual</span>
                        @endif
                    </p>
                    <p class="mb-3">{{ $asset->deskripsi }}</p>
                    <div class="d-flex justify-content-end gap-2">
                        <form action="{{ url('/admin/assets/' . $asset->id) }}" method="post">
                        @csrf
                        @method('delete')

                            <button type="submit" class="btn btn-danger" onclick="confirm('Yakin Menghapus Produk nama produk?')">
                            Hapus
                            </button>
                        </form>
                        @if ($asset->lelang)
                        <a href="{{ ($asset->lelang) ? url('lelang/' . $asset->id) : url('/admin/assets/' . $asset->id) }}" class="btn btn-warning">
                            Detail
                        </a>
                        @endif
                        @if(!$asset->lelang)
                            <a class="btn btn-success" href="{{ url('/admin/lelang/create/' . $asset->id) }}">
                                <i class="fas fa-shopping-cart"></i> Jual
                            </a>
                            <a class="btn btn-info" href="{{ url('/admin/assets/' . $asset->id . '/edit') }}">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $assets->links() }}
        </div>

    </section>
    @else
        <p class="text-center">Belum ada produk yang tersedia.</pc>
    @endif

    
@endsection

{{-- @section('content')
    <div class="pagetitle">
    <div>
        <h1>Produk</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
        </nav>
    </div>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <a href="{{ route('assets.create') }}" class="btn btn-primary mb-4">Tambah Produk</a>
        @if($assets->count() > 0)
        <div class="row g-4">
            @foreach($assets as $asset)
                <div class="col-10 col-sm-6 col-lg-4 mx-auto mx-sm-0">
                    <div class="card shadow-sm mb-0">
                        <div class="overflow-hidden ratio ratio-1x1 rounded-start">
                            <div>
                            <img src="/asset/img/card.jpg" class="h-100" alt="...">
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="text-decoration-none card-title fw-semibold fs-5 d-block mb-1 mt-2 py-0">
                                {{ $asset->game }}
                            </a>
                            <div class="d-flex justify-content-end gap-2">

                                @if($asset->lelang)
                                    @if($asset->lelang->status)
                                        <button class="btn btn-sm bg-success text-white">Sedang di lelang</button>
                                    @else
                                        <button class="btn btn-sm bg-primary text-white">Terjual</button>
                                    @endif
                                @else
                                    <button class="btn btn-sm bg-danger text-white">Belum dijual</button>
                                @endif

                                <form action="{{ url('/admin/assets/' . $asset->id) }}" method="post">
                                @csrf
                                @method('delete')

                                    <button type="submit" class="btn btn-danger" onclick="confirm('Yakin Menghapus Produk nama produk?')">
                                    Hapus
                                    </button>
                                </form>
                                <a href="{{ ($asset->lelang) ? url('lelang/' . $asset->id) : url('/admin/assets/' . $asset->id) }}" class="btn btn-warning">
                                    Detail
                                </a>
                                @if(!$asset->lelang)
                                    <a class="btn btn-success" href="{{ url('/admin/lelang/create/' . $asset->id) }}">
                                        <i class="fas fa-shopping-cart"></i> Jual
                                    </a>
                                    <a class="btn btn-info" href="{{ url('/admin/assets/' . $asset->id . '/edit') }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @else
        <p class="text-center">Belum ada produk yang tersedia.</pc>
    @endif
@endsection --}}


{{-- @section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Assets</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No.
                        </th>
                        <th style="width: 20%">
                            Nama Game - IGN
                        </th>
                        <th>
                            Project Progress
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 30%">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assets as $asset)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <a>
                                {{ $asset->game }}
                            </a>
                            <br />
                            <small>
                                {{ $asset->identifier }}
                            </small>
                        </td>
                        <td class="project_progress">
                            @if($asset->lelang)
                                @if($asset->lelang->status)
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="{{ $asset->siswa_waktu_persen }}" aria-volumemin="0" aria-volumemax="100" style="width: {{ $asset->siswa_waktu_persen }}%">
                                        </div>
                                    </div>
                                    <small>
                                        Siswa waktu {{ $asset->siswa_waktu }}
                                    </small>
                                @else
                                <small>
                                    Lelang selesai
                                </small>
                                @endif
                            @else
                            <small>
                                Belum di jual
                            </small>
                            @endif
                        </td>
                        <td class="project-state">
                            @if($asset->lelang)
                                @if($asset->lelang->status)
                                    <span class="badge badge-success">Sedang di lelang</span>
                                @else
                                    <span class="badge badge-primary">Terjual</span>
                                @endif
                            @else
                                <span class="badge badge-danger">Belum dijual</span>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ ($asset->lelang) ? url('/lelang/' . $asset->id) : url('/assets/' . $asset->id) }}">
                                <i class="fas fa-info"></i> Detail
                            </a>
                            @if(!$asset->lelang)
                                <a class="btn btn-success btn-sm" href="{{ url('/lelang/create/' . $asset->id) }}">
                                    <i class="fas fa-shopping-cart"></i> Jual
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ url('/assets/' . $asset->id . '/edit') }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                            @endif
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-account-modal{{ $asset->id }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<a href="{{ url('/assets/create') }}" class="btn btn-success float-right">Tambah Asset</a>

<!-- Lain kali jangan gini ngodingnya!!!, pake javascript dong. dasar aku -->
@foreach($assets as $asset)
<div class="modal fade" id="delete-account-modal{{ $asset->id }}">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Yakin ingin menghapus?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Data yang sudah di hapus tidak bisa di pulihkan kembali&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                <form action="{{ url('/assets/' . $asset->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection --}}
