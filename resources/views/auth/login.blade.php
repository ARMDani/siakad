@extends('layouts.login')

@section('content')
<div class="login-page">
    <div class="row justify-content-center">                {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                <div class="row">
                    <div class="loginkiri">
                      <div class="p-4 py-md-5">
                        <div class="d-flex align-items-center justify-content-center">
                          <img src="{{ asset ('dist/img/02.png') }}" height="249px" width="245px">
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="d-flex align-items-center justify-content-center">
                          <h2>ISTEK 'AISYIYAH KENDARI</h2>
                        </div>
                        </div>
                    </div>
                      <div class="p-5 py-md-5 bg-light">
                    <div class="card-body">
                        <h3 class="login-box-msg">Welcome in  <b>SIMAK</b></h3>
                          <br>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-2">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-8">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
