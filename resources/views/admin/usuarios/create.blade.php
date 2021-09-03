@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
    
            <li class="item">{{ __("Crear Nuevo Usuario Sistema") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ route('usuarios.store') }}"
            novalidate
        >

            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ __("Crear Nuevo Usuario Sistema") }}
                        </div>

                        <hr> 

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">
                                    {{ __("Nombre usuario") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name"
                                        id="name"
                                        value="{{ old('name') }}"
                                        required
                                        placeholder="{{ __("Ingrese nombre usuario") }}"
                                    >

                                    @if ( $errors->has('name') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sexo" class="col-md-4 col-form-label">
                                    {{ __("Sexo") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('sexo') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo_femenino" value="F" {{ (old('sexo') == 'F') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="sexo_femenino">Femenino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo_masculino" value="M" {{ (old('sexo') == 'M') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="sexo_masculino">Masculino</label>
                                    </div>
                                </div>

                                @if ( $errors->has('sexo') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label">
                                    {{ __("Correo electrónico") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        id="email"
                                        value="{{ old('email') }}"
                                        required
                                        placeholder="{{ __("Ingrese correo electrónico") }}"
                                    >

                                    @if ( $errors->has('email') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label">
                                    {{ __("Contraseña") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password"
                                        id="password"
                                        required
                                        placeholder="{{ __("Ingrese una contraseña") }}"
                                        autocomplete="new-password"
                                    >

                                    @if ( $errors->has('password') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            {{--  --}}

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label">
                                    {{ __("Confirmar contraseña") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="password"
                                        class="form-control"
                                        name="password_confirmation"
                                        id="password-confirm"
                                        required
                                        placeholder="{{ __("Confirme contraseña") }}"
                                        autocomplete="new-password"
                                    >

                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                        {{ $btnText }} <i class="bx bx-save"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection