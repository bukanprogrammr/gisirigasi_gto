@extends('layouts.outer')

@section('content')

<section class="ud-page-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-banner-content">
            <h1>Login</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Banner End ====== -->

  <!-- ====== Login Start ====== -->
  <section class="ud-login">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
            @if (session('pesan'))
      <div class="alert alert-success alert-dismissible">
        <h5><i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
      </div>
      @endif
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
          <div class="ud-login-wrapper">
            <div class="ud-login-logo">
              <img src="{{ asset('play-bootstrap-main') }}/assets/images/logo/SIDIG.png" alt="logo" />
            </div>
            <form class="ud-login-form" action="/login" method="post">
                @csrf
              <div class="ud-form-group">
                <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required autofocus placeholder="Username">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
              </div>
              <div class="ud-form-group">
                 <input type="password" name="password" class="form-control" id="password" required placeholder="*******">
              </div>
              <div class="ud-form-group">
                <button class="ud-main-btn w-100" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

    {{-- <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session('pesan'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
      </div>
      @endif
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
                            <label for="name">Username</label>
                            <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
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
    </div> --}}
@endsection
