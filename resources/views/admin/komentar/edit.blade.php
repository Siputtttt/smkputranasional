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
                    Post Blog
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('Komentar.update', $komentar->id_komentar) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $komentar->nama }}"
                                readonly>
                            <input type="hidden" class="form-control" name="id" value="{{ $komentar->id_komentar }}"
                                readonly>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" name="eamil" value="{{ $komentar->email }}"
                                readonly>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Email</label>
                            <textarea type="text" class="form-control" name="komentar" readonly>{{ $komentar->komentar }}</textarea>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value="validasi" {{ $komentar->status == 'validasi' ? 'selected' : '' }}>Validasi
                                </option>
                                <option value="belum validasi"
                                    {{ $komentar->status == 'belum validasi' ? 'selected' : '' }}>Belum Validasi</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-danger me-2">Simpan</button>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-success">Batal</a>
                        </div>
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
