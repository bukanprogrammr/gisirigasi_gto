@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    @if(session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="form-signin" method="POST" action="{{ route('change.password') }}">
                        @csrf

                        <h1 class="h3 mb-3 fw-normal text-center">Ganti Password</h1>

                        <div class="form-floating mb-3">
                            <label for="current_password">Password Lama</label>
                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" required>
                            @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-floating mb-3">
                            <label for="new_password">Password Baru</label>
                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" required>
                            @error('new_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" required>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
