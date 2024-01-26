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
                    LIst Blog
                </div>
                <div class="card-body">
                    <a href="{{ url('/Blog/create') }}" type="button" class="btn btn-primary mb-3"><i
                            class="fa-solid fa-id-card-clip"></i> Tambah Blog</a>
                    <div class="table-responsive">
                        <table id="example" class="table" width="100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($kontak as $kntk)
                                    <tr>
                                        <th scope="row text-center">{{ $i++ }}</th>
                                        <td class="text-center">{{ $kntk->nama_kontak }}</td>
                                        <td class="text-center">{{ $kntk->email_kontak }}</td>
                                        <td class="text-center">
                                            <p
                                                class="{{ $kntk->status == 'Dibaca' ? 'bg-success text-light' : 'bg-warning' }}">
                                                {{ $kntk->status }}</p>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('KontakA.destroy', $kntk->id_kontak) }}"
                                                method="POST">
                                                <a href="{{ route('KontakA.show', $kntk->id_kontak) }}"
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
                    <div class="mu-pagination">
                        <nav>
                            <ul class="pagination">
                                {{ $kontak->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    </main>
@endsection
