@extends('admin.layout.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            {{-- @if ($message = Session::get('pesan'))
                <div class="alert alert-success mt-5" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $message }}
                </div>
            @endif --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> {{ $errors }}
                </div>
            @endif --}}

            <div class="card mt-4">
                <div class="card-header text-light" style="background: rgb(152, 156, 160)">
                    <i class="fa-solid fa-database"></i>
                    Informasi kontak
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" value="{{ $kontak->nama_kontak }}" readonly>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">email</label>
                            <input type="text" class="form-control" value="{{ $kontak->email_kontak }}" readonly>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">No Telp</label>
                            <input type="text" class="form-control" value="{{ $kontak->notel_kontak }}" readonly>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">No Telp</label>
                            <input type="text" class="form-control" value="{{ $kontak->subject_kontak }}" readonly>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">pesan</label>
                            <textarea type="text" class="form-control" name="komentar" readonly>{{ $kontak->pesan_kontak }}</textarea>
                        </div>
                    </form>
                    <form method="post" action="{{ route('KontakA.update', $kontak->id_kontak) }}"
                        enctype="multipart/form-data" class="col-sm-5">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Status</label>
                            <input type="hidden" class="form-control" name="id" value="{{ $kontak->id_kontak }}" readonly>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value="">Pilih Status</option>
                                <option value="Dibaca" {{ $kontak->status == 'Dibaca' ? 'selected' : '' }}>Dibaca</option>
                                <option value="Belum dibaca" {{ $kontak->status == 'Belum dibaca' ? 'selected' : '' }}>Belum Dibaca</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            ClassicEditor
                .create(document.querySelector('#ckeditor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script src="https://cdn.ckbox.io/ckbox/2.0.0/ckbox.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    </main>
@endsection
