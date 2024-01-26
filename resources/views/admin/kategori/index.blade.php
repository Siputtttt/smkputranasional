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
                    <strong>Error!</strong> <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-header text-light" style="background: rgb(152, 156, 160)">
                    <i class="fa-solid fa-database"></i>
                    Daftar Kategori
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fa-solid fa-id-card-clip"></i> Tambah Kategori</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('Kategori.store') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                            <input type="text" class="form-control" name="nama_kategori">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                                            <textarea type="text" class="form-control" name="keterangan_kategori"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table" width="100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($kategori as $kt)
                                    <tr>
                                        <th scope="row text-center">{{ $i++ }}</th>
                                        <td class="text-center">{{ $kt->nama_kategori }}</td>
                                        <td class="text-center">{{ $kt->keterangan_kategori }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('Kategori.destroy', $kt->id_kategori) }}" method="POST">
                                                <a href="{{ route('Kategori.show', $kt->id_kategori) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i> Lihat Berita
                                                </a>
                                                <a href="{{ route('Kategori.edit', $kt->id_kategori) }}"
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
