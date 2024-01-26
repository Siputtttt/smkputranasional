@extends('admin.layout.app')

@section('content')
    <main>
        <div class="container-fluid pt-5 px-4">
            @if ($message = Session::get('pesan'))
                <div class="alert alert-success mt-2" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $message }}
                </div>
            @endif
            <div class="justify-content-center">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Profile Login
                    </div>
                    <div class="card-body">
                        <div class="container ">
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $user->email }}">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>
                                {{-- <div class="mb-3 col-sm-6">
                                    <label for="exampleInputEmail1" class="form-label">Role</label>
                                    <input type="text" class="form-control" readonly value="{{ $user->role }}">
                                </div> --}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container ">
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputEmail1" class="form-label">Password Lama</label>
                                    <input type="password" name="current_password" class="form-control">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
