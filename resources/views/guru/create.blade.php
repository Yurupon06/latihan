@extends('dashboard.master')
@section('title', 'Guru')
@section('nav')
    @include('dashboard.nav')
@endsection
@section('page', 'Guru')
@section('main')

<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>New Guru</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="card border-1 m-3 pt-3">
                            <form action="{{ route('guru.store') }}" id="formGuru" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 ms-3 me-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="ps-2 form-control border border-secondary-subtle @error('name') is-invalid @enderror" placeholder="Nama" aria-label="Name" id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 ms-3 me-3">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-select @error('jk') is-invalid @enderror" id="jk" name="jk">
                                        <option value="L" @if (old('jk') == 'L') selected @endif>Laki Laki</option>
                                        <option value="P" @if (old('jk') == 'P') selected @endif>Perempuan</option>
                                    </select>
                                    @error('jk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 ms-3 me-3">
                                    <label for="notelp" class="form-label">No Telp</label>
                                    <input type="number" class="ps-2 form-control border border-secondary-subtle @error('notelp') is-invalid @enderror" placeholder="Nomer Telpon" aria-label="notelp" id="notelp" name="notelp" value="{{ old('notelp') }}">
                                    @error('notelp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 ms-3 me-3">
                                    <label for="foto" class="form-label">Image</label>
                                    <input type="file" class="form-control border border-secondary-subtle @error('foto') is-invalid @enderror" id="foto" name="foto">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="ms-3 me-3 text-end">
                                    <a href="{{ route('guru.index') }}" class="btn btn-danger bg-gradient-primary w-15 my-4 mb-2">Cancel</a>
                                    <button type="submit" id="save" class="btn btn-success bg-gradient-success w-15 my-4 mb-2">Tambah</button> 
                                </div>     
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    document.getElementById("formGuru").addEventListener("submit", function(event) {
        let emptyFields = [];
        const name = document.getElementById("name");
        const notelp = document.getElementById("notelp");
        const foto = document.getElementById("foto");

        if (name.value === "") {
            emptyFields.push("Name");
        }
        if (notelp.value === "") {
            emptyFields.push("No Telp");
        }
        if (foto.value === "") {
            emptyFields.push("Foto");
        }
        if (emptyFields.length > 0) {
            event.preventDefault(); // Prevent form from submitting if there are empty fields
            const errorMessage = "Incomplete Data. Please fill in the following fields: " + emptyFields.join(", ");
            Swal.fire("Error", errorMessage, "error");
        }
    });
</script> --}}

@endsection
