@extends('admin.layout.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            @if ($message = Session::get('pesan'))
                <div class="alert alert-success mt-5" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $message }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> {{ $errors }}
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-header text-light" style="background: rgb(152, 156, 160)">
                    <i class="fa-solid fa-database"></i>
                    List Galeri
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Galeri</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('GaleriA.store') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Judul</label>
                                            <input type="text" name="judul_gambar" class="form-control" required>
                                            @error('judul_gambar')
                                                <div class="text-danger ms-2"><strong>Masukan Judul gambar</strong></div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Filter</label>
                                            <select class="form-select" name="nama_filter" required>
                                                <option value="">Pilih Status</option>
                                                @foreach ($filter as $fltr)
                                                    <option value="{{ $fltr->filter }}">{{ $fltr->filter }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Foto</label><br>
                                            <img src="" id="output" width="80%">
                                            <input type="file" class="form-control mt-2" name="foto" id="foto"
                                                value="{{ old('foto') }}" accept=".jpg, .jpeg, .png"
                                                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" required>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end Modal --}}
                    {{-- Table --}}
                    <div class="table-responsive">
                        <table id="example" class="table" width="100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Filter</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($galeri as $glr)
                                    <tr>
                                        <th scope="row text-center">{{ $i++ }}</th>
                                        <td class="text-center col-sm-2"><img
                                                src="{{ url('/galeri') . '/' . $glr->gambar }}" id="output"
                                                width="100%"></td>
                                        <td class="text-center">{{ $glr->judul_gambar }}</td>
                                        <td class="text-center">{{ $glr->nama_filter }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('GaleriA.destroy', $glr->id_galeri) }}" method="POST">
                                                <a href="{{ route('GaleriA.edit', $glr->id_galeri) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin  Data Akan Dihapus?')" type="submit"
                                                    class="btn btn-danger" id="hapus">
                                                    <i class="fa-solid fa-trash"></i> Hapus
                                                </button>
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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

        <!-- Or for RTL support -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    responsive: true
                });
            });
        </script>
    </main>
@endsection
