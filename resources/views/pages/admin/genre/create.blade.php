@extends('layouts.admin')

@section('content')

<section class="section dashboard">
    <div class="card recent-sales overflow-auto">
      <div class="card-body">
        <h5 class="card-title">Tambah Genre</h5>
            <form action="{{route('genre.store')}}" method="post">
                @csrf
                <div class="row g-2">
                    <div class="col-12 col-md-6">
                        <div class="">
                            <label for="genre" class="form-label">Nama Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>

@endsection
