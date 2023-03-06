@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
      <div>
        <h1>Lelang Berlangsung</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="index.html">Lelang</a></li>
            <li class="breadcrumb-item active">{{ $asset->game }}</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
      <div class="card pt-4">
        <div class="card-body row g-4">
            <div class="col-10 col-md-3 mx-auto">
                <div class="w-100 ratio ratio-1x1 overflow-hidden rounded-3">
                    <div class="w-100">
                        <img src="/asset/img/product-1.jpg" alt="" class="h-100">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <h3 class="fw-bold">{{ $asset->game }}</h3>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Vendor: {{ $asset->identifier }}</strong></li>
                </ul>
                <p class="mb-2">{{ $asset->deskripsi }}</p>
                <a href="edit-produk.html" class="btn btn-outline-primary">Edit</a>
                <form action="{{ url('/admin/assets/' . $asset->id) }}" method="post" class="d-flex justify-content-end gap-2">
                    @csrf
                    @method('delete')
                  <button type="submit" onclick="confirm('Yakin akan menghapus produk {{ $asset->game }}?')" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
      </div>

    </section>
@endsection

@section('content-header', 'Detail Asset')

@section('content')

<!-- Default box -->
<div class="card col-md-6">
    <div class="card-header">
        <h3 class="card-title">Detail</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <h3 class="text-secondary"><i class="fas fa-paint-brush"></i>{{ $asset->game }}</h3>
            <p class="text-muted">{{ $asset->deskripsi }}</p>

            <h5 class="mt-2">In Game Name</h5>
            <span class="d-block text-muted">{{ $asset->identifier }}</span>

            <h5 class="mt-3">Genre Game</h5>
            <ul class="list-unstyled text-muted">
                @foreach($asset->genres as $genre)
                <li>{{ $genre->genre }}</li>
                @endforeach
            </ul>
            <div class="text-center mt-5 mb-3">
                <a href="{{ url('/assets/' . $asset->id . '/edit') }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i>Edit</a>
                <button href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-account-modal"><i class="fas fa-trash"></i>Hapus</button>
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
<a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Kembali</a>
@endsection
