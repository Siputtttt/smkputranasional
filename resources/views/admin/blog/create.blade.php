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
                    <form method="post" action="{{ route('Blog.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{ old('judul') }}"
                                maxlength="80" required>
                            @error('judul_gambar')
                                <div class="text-danger ms-2"><strong>Judul Sudah Digunakan</strong></div>
                            @enderror
                            <input type="hidden" class="form-control" name="penulis" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Kutipan</label>
                            <input type="text" class="form-control" name="kutipan" value="{{ old('kutipan') }}"
                                maxlength="50" required>
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
                                    <textarea id="ckeditor" name="isi" rows="8" cols="45">{{ old('isi') }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 col-sm-4 ">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-bold">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-bold">kategori</label>
                                    <select class="form-select" name="id_kategori" required>
                                        <option selected value="">Pilih Status</option>
                                        @foreach ($kt as $kategori)
                                            <option value="{{ $kategori->id_kategori }}"
                                                {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="col-sm-4"><label class="form-label fw-bold">Foto</label></div>
                                    <div class="col-sm-8">
                                        <img src="" id="output" width="100%">
                                        <input type="file" class="form-control mt-2" name="foto" id="foto"
                                            value="{{ old('foto') }}" accept=".jpg, .jpeg, .png" required
                                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
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
                .create(document.querySelector('#ckeditor')).catch(error => {
                    console.error(error);
                    image: {
                        styles: {
                            // Defining custom styling options for the images.
                            options: [{
                                    name: 'side',
                                    icon: sideIcon,
                                    title: 'Side image',
                                    className: 'image-side',
                                    modelElements: ['imageBlock']
                                }, {
                                    name: 'margin-left',
                                    icon: leftIcon,
                                    title: 'Image on left margin',
                                    className: 'image-margin-left',
                                    modelElements: ['imageInline']
                                }, {
                                    name: 'margin-right',
                                    icon: rightIcon,
                                    title: 'Image on right margin',
                                    className: 'image-margin-right',
                                    modelElements: ['imageInline']
                                },
                                // Modifying icons and titles of the default inline and
                                // block image styles to reflect its real appearance.
                                {
                                    name: 'inline',
                                    icon: inlineIcon
                                }, {
                                    name: 'block',
                                    title: 'Centered image',
                                    icon: centerIcon
                                }
                            ]
                        };
                        toolbar: [{
                            // Grouping the buttons for the icon-like image styling
                            // into one drop-down.
                            name: 'imageStyle:icons',
                            title: 'Alignment',
                            items: [
                                'imageStyle:margin-left',
                                'imageStyle:margin-right',
                                'imageStyle:inline'
                            ],
                            defaultItem: 'imageStyle:margin-left'
                        }, {
                            // Grouping the buttons for the regular
                            // picture-like image styling into one drop-down.
                            name: 'imageStyle:pictures',
                            title: 'Style',
                            items: ['imageStyle:block', 'imageStyle:side'],
                            defaultItem: 'imageStyle:block'
                        }, '|', 'toggleImageCaption', 'linkImage']
                    }
                });
        </script>
        <script src="https://cdn.ckbox.io/ckbox/2.0.0/ckbox.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    </main>
@endsection
