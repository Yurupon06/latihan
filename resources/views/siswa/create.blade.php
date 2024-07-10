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
            <h6>New siswa</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <div class="card border-1 m-3 pt-3">
                <form action="{{ route('siswa.store')}}" id="formSiswa" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 ms-3 me-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="ps-2 form-control border border-secondary-subtle" placeholder="nama" aria-label="Name" id="name" name="name">
                    </div>

                    <div class="mb-3 ms-3 me-3">
                      <label for="id_guru" class="form-label">Guru Pembimbing</label>
                      <select id="id_guru" name="id_guru" class="form-select" aria-label="Default select example">
                          <option selected disabled>Select</option>
                          @foreach ($guru as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="mb-3 ms-3 me-3">
                      <label for="jk">Jenis Kelamin</label>
                      <select class="form-select @error('jk') is-invalid @enderror" id="jk" name="jk">
                          <option value="L" @if (old('jk') == 'L') selected @endif>Laki Laki</option>
                          <option value="P" @if (old('jk') == 'P') selected @endif>Perempuan</option>
                      </select>
                    </div>

                    <div class="mb-3 ms-3 me-3">
                      <label for="notelp" class="form-label">No telp</label>
                      <input type="number" class="ps-2 form-control border border-secondary-subtle" placeholder="Nomer Telpon" aria-label="notelp" id="notelp" name="notelp">
                    </div>

                    <div class="ms-3 me-3 text-end">
                      <a href="{{ route('siswa.index') }}" class="btn btn-danger bg-gradient-primary w-15 my-4 mb-2">Cancel</a>
                      <button type="button" id="save" class="btn btn-success bg-gradient-success w-15 my-4 mb-2">Tambah</button> 
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
    const btnSimpan = document.getElementById("save");
    const form = document.getElementById("formSiswa");
    const name = document.getElementById("name");
    const notelp = document.getElementById("notelp");

    function simpan(event) {
      let emptyFields = [];

      if (name.value === "") {
          emptyFields.push("Name");
      }
      if (notelp.value === "") {
          emptyFields.push("Nomer telp");
      }

      if (emptyFields.length > 0) {
          event.preventDefault(); // Prevent form from submitting if there are empty fields
          const errorMessage = "Incomplete Data. Please fill in the following fields: " + emptyFields.join(", ");
          Swal.fire("Error", errorMessage, "error");
      } else {
          // If all fields are filled, submit the form
          form.submit();
      }
    }

    btnSimpan.addEventListener('click', simpan);
  </script> --}}

@endsection