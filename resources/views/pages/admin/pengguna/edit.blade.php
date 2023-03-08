@extends('layouts.admin')

@section('content')

<section class="section dashboard">
    <div class="card recent-sales overflow-auto">
      <div class="card-body">
        <h5 class="card-title">Edit {{$user->id}}</h5>
        <div class="row">
          {{-- <div class="col-8 col-md-3 mx-auto mx-md-0">
            <div class="ratio ratio-1x1 rounded-3 overflow-hidden">
              <div class="w-100">
                <img src="/assets/img/profile-img.jpg" alt="" class="w-100">
              </div>
            </div>
          </div> --}}
          <div class="col-12">
            <div class="row g-2">
              <div class="col-12 col-md-6">
                <div class="">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="">
                  <label for="username" class="form-label">No. Telpon</label>
                  <input type="text" class="form-control" id="username" placeholder="Masukkan Username" value="08123">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Masukkan Username" value="wangsafu" disabled>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="">
                  <label for="kota" class="form-label">Kota</label>
                  <input type="text" class="form-control" id="kota" placeholder="Masukkan Kota" value="Kosmabi">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="">
                  <label for="profil" class="form-label">Foto Profil</label>
                  <input class="form-control" type="file" id="profil">
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <a href="reset-password.html" class="btn btn-outline-primary">Reset Password</a>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

