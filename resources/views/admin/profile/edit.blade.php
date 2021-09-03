@extends('layouts.app')

@section('content')

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('perfil.index') }}">Perfil usuario</a></li>
    
            <li class="item">{{ __("Editar Perfil Usuario") }}</li>
        </ol>
    </div>


    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ route('perfil.update', ['id' => auth()->user()->id]) }}"
            novalidate
            enctype="multipart/form-data"
        >
            {{-- actualizar --}}
            @method('PUT')

            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ __("Editar Perfil Usuario") }}
                        </div>

                        <hr> 

                        <div class="card-body">


                            <div class="form-group row">

                                <label for="picture" class="col-md-4 col-form-label">
                                    {{ __("Subir imagen perfil (opcional)") }}
                                </label>
    
                                <div class="col-md-8">
    
                                    <div class="custom-file">
                                        <input
                                            type="file" name="picture" id="picture" lang="es"
                                            class="custom-file-input{{ $errors->has('picture') ? ' is-invalid' : '' }}"
                                        >
                                        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                        
                                        @if ( $errors->has('picture') )
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('picture') }}</strong>
                                            </span>
                                        @endif
                                    </div>
        
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">
                                    {{ __("Nombre usuario") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name"
                                        id="name"
                                        value="{{ old('name') ?: $usuario->name }}"
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
                                        value="{{ old('email') ?: $usuario->email }}"
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
                                    {{ __("Nueva Contraseña (solo si desea cambiar contraseña a este usuario)") }}
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

@endsection
