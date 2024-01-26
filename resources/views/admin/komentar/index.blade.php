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
                    <div class="table-responsive">
                        <table id="example" class="table" width="100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">komentar</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($komentar as $kmt)
                                    <tr>
                                        <th scope="row text-center">{{ $i++ }}</th>
                                        <td class="text-center">{{ $kmt->nama }}</td>
                                        <td class="text-center">{{ $kmt->email }}</td>
                                        <td>{{ $kmt->komentar }}</td>
                                        <td class="text-center">
                                            <p class="{{ $kmt->status == 'validasi' ? 'bg-success text-light' : 'bg-warning' }}">{{ $kmt->status }}</p>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('Komentar.destroy', $kmt->id_komentar) }}"
                                                method="POST">
                                                <a href="{{ route('Komentar.edit', $kmt->id_komentar) }}" class="btn btn-warning m-1">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin  Data Akan Dihapus?')" type="submit"
                                                    class="btn btn-danger m-1" id="hapus">
                                                    <i class="fa-solid fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mu-pagination">
                            <nav>
                                <ul class="pagination">
                                    {{ $komentar->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
