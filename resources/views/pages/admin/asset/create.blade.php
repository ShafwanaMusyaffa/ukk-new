@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
      <h1>Tambah Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="index.html">Produk</a></li>
          <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="card recent-sales overflow-auto">
        <div class="card-body">
          <h5 class="card-title">Tambah Produk</h5>
            <form action="{{ route('assets.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                        
                    <div class="col-12 col-md-6">
                    <div class="">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" name="game" id="game" value="{{ old('game') }}" class="form-control @error('game') is-invalid @enderror" placeholder="Nama Produk" autofocus required>
                        
                        @error('game')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="">
                        <label for="init_price" class="form-label">Vendor/Brand</label>
                        <input type="text" name="identifier" id="identifier" value="{{ old('identifier') }}" class="form-control @error('identifier') is-invalid @enderror" required>
                    
                        @error('identifier')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div>
                        <label for="formFile" class="form-label">Foto Produk</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div>
                        <label for="tutupLelang" class="form-label">Kategori</label>
                        <select name="genre[]" id="genre" class="form-select @error('genre') is-invalid @enderror" >
                            @php
                            // Refill old value of genres
                            if(old('genre')){
                            foreach(old('genre') as $og){
                            $old_genres[$og] = true;
                            }
                            }
                            @endphp
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" @if(isset($old_genres[$genre->id])) selected @endif>{{ $genre->genre }}</option>
                            @endforeach
                            </select>
                            @error('genre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </select>
                    </div>
                    </div>
                    <div class="col-12">
                        <div class="">
                            <label for="desc" class="form-label">Deskripsi Produk</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </section>
@endsection

@section('css-plugin')
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.css') }}">
@endsection

@section('content-header', 'Tambah asset')

@section('content')
<div class="col-sm-6">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Tambah asset</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('assets.store') }}">
                @csrf
                <div class="form-group">
                    <label for="game">Nama game</label>
                    <input type="text" name="game" id="game" value="{{ old('game') }}" class="form-control @error('game') is-invalid @enderror" required autofocus>
                    @error('game')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="identifier">IGN</label>
                    <input type="text" name="identifier" id="identifier" value="{{ old('identifier') }}" class="form-control @error('identifier') is-invalid @enderror" required>
                    @error('identifier')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <select name="genre[]" id="genre" class="genres @error('genre') is-invalid @enderror" multiple=" multiple" data-placeholder="Pilih Genre" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        @php
                        // Refill old value of genres
                        if(old('genre')){
                        foreach(old('genre') as $og){
                        $old_genres[$og] = true;
                        }
                        }
                        @endphp
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" @if(isset($old_genres[$genre->id])) selected @endif>{{ $genre->genre }}</option>
                        @endforeach
                    </select>
                    @error('genre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@section('js-plugin')
<script src="{{ asset('vendor/select2/dist/js/select2.js') }}"></script>
@endsection
@section('js')
<script src="{{ asset('js/pages/asset/create.js') }}"></script>
@endsection
