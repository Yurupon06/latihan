@extends('dashboard.master')
@section('title', 'discount')
@section('nav')
    @include('dashboard.nav')
@endsection
@section('page', 'discount')
@section('main')

<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navigation">
      <div class="mx-auto">
        <form method="GET" action="{{ route('guru.index') }}" class="">
          <div class="input-group no-border">
              <input type="search" name="search" class="form-control" placeholder="Search name...">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-primary"><i class=""></i> Search</button>
              </div>
          </div>
        </form>
      </div>
      <div class="justify-content-end">
        @include('dashboard.main')
      </div>
    </div>
  </div>
</nav>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <a class="btn btn-primary" href="{{ route('siswa.create')}}"><span>add new item</span></a>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="datatable">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama siswa</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Guru Pembimbing</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto Guru Pembimbing</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Kelamin</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Telp</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($siswa as $idx => $dt)
                        
                      
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            {{ $idx + 1 . " . " }}
                          </div>
                        </td>
                        <td>
                         {{ $dt->name }}
                        </td>
                        <td>
                         {{ $dt->guru->name }}
                        </td>
                        <td>
                          <img src="storage/{{ $dt->guru->foto }}" class="img-thumbnail" alt="" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>
                          @switch($dt->jk)
                              @case('L')
                                  Laki Laki
                              @break

                              @case('P')
                                  Perempuan
                              @break

                              @default
                                  Lainnya
                          @endswitch
                      </td>
                        <td>
                         {{ $dt->notelp }}
                        </td>
                      
                        <td class="align-middle text-center text-sm">
                          <a href="{{ route('siswa.edit', $dt->id) }}">
                              <button class="btn btn-success"><span class="badge badge-sm bg-gradient-success">Edit</span></button>
                          </a>
                          <form action="{{ route('siswa.destroy', $dt->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-btn"><span class="badge badge-sm bg-gradient-danger">Delete</span></button>
                        </form>
                      </td>
                      
                        
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<input type="hidden" id="sts" class="form-control" value="{{ session('status') }}" />
<input type="hidden" id="psn" class="form-control" value="{{ session('pesan') }}" />

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const sts = document.getElementById('sts').value;
    const psn = document.getElementById('psn').value;

    function pesanSimpan() {
      if (sts === 'simpan') {
        Swal.fire("Good job", psn, "success");
      }
    }

    pesanSimpan();
  });
</script>

@endsection
