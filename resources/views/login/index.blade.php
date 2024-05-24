@extends('layouts.frontend')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session()->has('loginError'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('loginError') }}
                    </div>
                    @endif

                    <form class="form-signin" action="/login" method="post">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

                        <div class="form-floating mb-3">
                            <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name@example.com" value="{{ old('name') }}" required autofocus>
                            <label for="name">Username</label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>

                    <p class="mt-3 text-center">Belum punya akun? <a href="/register">Daftar sekarang</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
