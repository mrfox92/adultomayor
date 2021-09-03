@extends('layouts.app')

@section('content')

<!-- Start Login Area -->
<div class="login-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="login-form">
                <div class="logo">
                    <img class="img-fluid" width="150" height="150" src="{{ asset('img/municipalidad.jpg') }}" alt="image">
                </div>

                <h2 class="text-center text-uppercase">Inicio de sesión</h2>

                <form novalidate method="POST" action="{{ route('login') }}">

                    {{-- protección csrf --}}
                    @csrf

                    <div class="form-group">

                        <input id="email" type="email" placeholder="Correo electrónico" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="label-title"><i class='bx bx-user'></i></span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="label-title"><i class='bx bx-lock'></i></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <button type="submit" class="login-btn">Acceder</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Login Area -->
@endsection
