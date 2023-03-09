@extends('layouts.admin')

@section('content')

<section class="section dashboard">
    <div class="card recent-sales overflow-auto">
      <div class="card-body">
        <h5 class="card-title">Tambah Staff</h5>
        <div class="row">
          {{-- <div class="col-8 col-md-3 mx-auto mx-md-0">
            <div class="ratio ratio-1x1 rounded-3 overflow-hidden">
              <div class="w-100">
                <img src="/assets/img/profile-img.jpg" alt="" class="w-100">
              </div>
            </div>
          </div> --}}
          <div class="col-12">
            <form action="{{route('admin.admin.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="row g-2">
                <div class="col-12 col-md-6">
                    <div class="">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama" required autofocus>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="">
                    <label for="no_telp" class="form-label">No. Telpon</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Telpon">
                </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Email">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" aria-label="Pilih Role Staff" name="role" id="role">
                            <option selected>Pilih Role Staff</option>
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

