@extends('auth.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 30rem;top:50%;">
                <h1 class="text-center"><img src="{{url('/users/assets/img/logo1.png')}}" width="80%"></h1>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <x-text-input id="email" class="form-control" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" aria-describedby="emailHelp" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <x-text-input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-3 form-check">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
