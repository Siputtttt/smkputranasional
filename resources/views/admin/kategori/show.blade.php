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
                    <form>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori"
                                value="{{ $kategori->nama_kategori }}" readonly>
                            <input type="hidden" class="form-control" name="id" value="{{ $kategori->id_kategori }}"
                                readonly>
                        </div>
                        <div class="form-group mb-3 col-sm-5 ">
                            <label class="form-label fw-bold">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan_kategori" readonly>{{ $kategori->keterangan_kategori }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <a href="{{url('/Kategori')}}" type="button" class="btn btn-danger">Batal</a>
                        </div>
                    </form>

                    <div class="table-responsive mt-3">
                        <table id="example" class="table" width="100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Penulis</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($blog as $blog)
                                    <tr>
                                        <th scope="row text-center">{{ $i++ }}</th>
                                        <td class="text-center col-sm-2"><img
                                                src="{{ url('/storage') . '/' . $blog->gambar }}" id="output"
                                                width="100%"></td>
                                        <td class="text-center">{{ $blog->judul }}</td>
                                        <td class="text-center">{{ $blog->tanggal }}</td>
                                        <td class="text-center">{{ $blog->penulis }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('Blog.destroy', $blog->id) }}" method="POST">
                                                <a href="{{ route('Blog.edit', $blog->id) }}" class="btn btn-primary">
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
        <script>
            ClassicEditor
                .create(document.querySelector('#ckeditor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
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
