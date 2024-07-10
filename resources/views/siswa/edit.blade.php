@extends('dashboard.master')
@section('title', 'discount')
@section('nav')
    @include('dashboard.nav')
@endsection
@section('page', 'discount')
@section('main')

<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Siswa</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="card border-1 m-3 pt-3">
                            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 ms-3 me-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="ps-2 form-control border border-secondary-subtle @error('name') is-invalid @enderror"
                                        value="{{ old('name', $siswa->name) }}" placeholder=" Name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 ms-3 me-3">
                                    <label for="id_guru" class="form-label">Guru Pembimbing</label>
                                    <select id="id_guru" name="id_guru" class="form-select" aria-label="Default select example">
                                        @foreach ($guru as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $siswa->id_guru ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 ms-3 me-3">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-select @error('jk') is-invalid @enderror" id="jk" name="jk">
                                        <option value="L" @if ($siswa->jk == 'L' || old('jk') == 'L') selected @endif>Laki Laki</option>
                                        <option value="P" @if ($siswa->jk == 'P' || old('jk') == 'P') selected @endif>Perempuan</option>
                                    </select>
                                    @error('jk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 ms-3 me-3">
                                    <label for="notelp">Nomor Telepon</label>
                                    <input type="number" name="notelp" id="notelp"
                                        class="ps-2 form-control border border-secondary-subtle @error('notelp') is-invalid @enderror"
                                        value="{{ old('notelp', $siswa->notelp) }}" placeholder=" Nomor Telepon">
                                    @error('notelp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="ms-3 me-3 text-end">
                                    <a href="{{ route('guru.index') }}" type="button" class="btn btn-danger bg-gradient-primary ws-15 my-4 mb-2">Cancel</a>
                                    <button type="submit" class="btn btn-success bg-gradient-success ws-15 my-4 mb-2" >Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection