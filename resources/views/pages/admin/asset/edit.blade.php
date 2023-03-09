@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
      <h1>Edit Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="index.html">Produk</a></li>
          <li class="breadcrumb-item active">Edit Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="card recent-sales overflow-auto">
        <div class="card-body">
          <h5 class="card-title">Edit Produk</h5>
            <form action="{{ url('/admin/assets/'. $asset->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row g-3">

                        
                    <div class="col-12 col-md-6">
                    <div class="">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" name="game" id="game" value="{{ old('game') ?? $asset->game }}" class="form-control @error('game') is-invalid @enderror" placeholder="Nama Produk" autofocus required>
                        
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
                        <input type="text" name="identifier" id="identifier" value="{{ old('identifier') ?? $asset->identifier }}" class="form-control @error('identifier') is-invalid @enderror" required>
                    
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
                            <?php
                            // Refill old value of genres
                            if(old('genre')){
                                foreach(old('genre') as $og){
                                    $fill_genres[$og] = true;
                                }
                            } else {
                                foreach($asset->genres as $og){
                                    $fill_genres[$og->id] = true;
                                }
                            }
                            ?>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" @if(isset($fill_genres[$genre->id])) selected @endif>{{ $genre->genre }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-12">
                        <div class="">
                            <label for="desc" class="form-label">Deskripsi Produk</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') ?? $asset->deskripsi}}</textarea>
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