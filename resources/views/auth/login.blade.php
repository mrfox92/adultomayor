@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Login Area -->
{{-- <div class="login-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="login-form">
                <div class="logo">
                    <a href="dashboard-analytics.html"><img src="assets/img/logo.png" alt="image"></a>
                </div>

                <h2>Welcome</h2>

                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                        <span class="label-title"><i class='bx bx-user'></i></span>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="label-title"><i class='bx bx-lock'></i></span>
                    </div>

                    <div class="form-group">
                        <div class="remember-forgot">
                            <label class="checkbox-box">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>

                            <a href="forgot-password.html" class="forgot-password">Forgot password?</a>
                        </div>
                    </div>

                    <button type="submit" class="login-btn">Login</button>

                    <p class="mb-0">Don’t have an account? <a href="register.html">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Login Area -->
@endsection
