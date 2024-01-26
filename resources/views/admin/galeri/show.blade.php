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
                    <form method="post" action="{{ route('Blog.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Penulis</label>
                            <input type="text" class="form-control" name="penulis" value="{{ $blog->penulis }}" readonly>
                            <input type="hidden" class="form-control" name="id" value="{{$blog->id}}" readonly>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{ $blog->judul }}" required>
                            @error('judul')
                                <div class="text-danger ms-2"><strong>Judul Sudah Digunakan</strong></div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Kutipan</label>
                            <input type="text" class="form-control" name="kutipan" value="{{ $blog->kutipan }}" required>
                            @error('kutipan')
                                <div class="text-danger ms-2 "><b> bagian Berita</b></div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-sm-8 ">
                                <label class="form-label fw-bold">Blog</label>
                                <div>
                                    @error('isi')
                                        <div class="text-danger ms-2">Blog <strong>Tidak boleh kosong!!</strong></div>
                                    @enderror
                                    <textarea id="ckeditor" name="isi">{{ $blog->isi }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 col-sm-4 ">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-bold">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" value="{{ $blog->tanggal }}"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-bold">kategori</label>
                                    <select class="form-select" name="id_kategori" required>
                                        <option>Pilih Status</option>
                                        @foreach ($kategori as $kt)
                                            <option value="{{ $kt->id_kategori }}"
                                                {{ $blog->id_kategori == $kt->id_kategori ? 'selected' : '' }}>
                                                {{ $kt->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="col-sm-4"><label class="form-label fw-bold">Foto</label></div>
                                    <div class="col-sm-8">
                                        <img src="{{ url('/storage') . '/' . $blog->gambar }}" id="output"
                                            width="100%">
                                        <input type="file" class="form-control mt-2" name="foto" id="foto" accept=".jpg, .jpeg, .png"
                                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                        <input type="hidden" name="fotolama" id="fotolama" value="{{ $blog->gambar }}">
                                    </div>
                                </div>
                            </div>
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
