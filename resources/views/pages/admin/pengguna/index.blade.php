@extends('layouts.admin')

@section('content')
<section class="section dashboard">
    <div class="card recent-sales overflow-auto">

      <div class="card-body">
        <h5 class="card-title">Pengguna</h5>

        <table id="table-pengguna" class="display">
          <thead>
              <tr>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>No. Handphone</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                  <td class="text-capitalize">{{$user->nama_lengkap}}</td>
                  <td class="text-capitalize">{{$user->email}}</td>
                  <td class="text-capitalize"><a>{{$user->no_telp}}</a></td>
                  <td>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{$user->id}}">
                        <i class="bi bi-trash"></i>
                    </button>
                    <a href="{{ url('/admin/pengguna/' . $user->id) }}" class="btn btn-primary btn-sm">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  </td>
              </tr>

              {{-- Modal --}}
              <div class="modal fade" id="modalDelete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="modalDelete{{$user->id}}">Yakin akan menghapus pengguna {{$user->nama_lengkap}}</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form action="{{ route('admin.pengguna.hapus', $user->id) }}"
                        method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </tbody>
      </table>
      </div>
    </div>
  </section>
@endsection

