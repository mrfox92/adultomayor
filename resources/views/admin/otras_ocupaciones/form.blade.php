
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ $otra_ocupacion->id ? route('psd.show', ['id' => $otra_ocupacion->psd_id] ) : route('psd.show', ['id' => $psd->id] ) }}">Fichas PSD</a></li>
    
            <li class="item">{{ $otra_ocupacion->id ? __("Editar Ficha Otra ocupación PSD") : __("Agregar Ficha Otra ocupación PSD") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $otra_ocupacion->id ? route('otras.store') : route('otras.update', ['id' => $otra_ocupacion->id]) }}"
    novalidate
    >
    
    @if ( $otra_ocupacion->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $otra_ocupacion->id )
                            {{ $otra_ocupacion->psd->nombres }} {{ $otra_ocupacion->psd->apellidos }}
                        @else
                            {{ $psd->nombres }} {{ $psd->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $otra_ocupacion->id ? __("Editar Ficha Otra ocupación PSD") : __("Agregar Ficha Otra ocupación PSD") }}
                        </h5>

                        @if ( !$otra_ocupacion->id )

                            <div class="form-group row">
                                <div class="col-md-8">

                                    <input type="hidden"
                                        class="form-control"
                                        name="psd_id"
                                        id="psd_id"
                                        value="{{ $psd->id }}"
                                    >

                                </div>
                            </div>
                            
                        @endif
                        
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">
                                {{ __("Nombre") }}
                            </label>
                            <div class="col-md-8">

                                <input type="text"
                                    class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                    name="nombre"
                                    id="nombre"
                                    value="{{ old('nombre') ?: $otra_ocupacion->nombre }}"
                                    required
                                    placeholder="{{ __("Ingrese nombre lugar ocupación") }}"
                                >

                                @if ( $errors->has('nombre') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label">
                                {{ __("Dirección") }}
                            </label>
                            <div class="col-md-8">

                                <input type="text"
                                    class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                    name="direccion"
                                    id="direccion"
                                    value="{{ old('direccion') ?: $otra_ocupacion->direccion }}"
                                    required
                                    placeholder="{{ __("Ingrese direccion lugar ocupación") }}"
                                >

                                @if ( $errors->has('direccion') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">
                                {{ __("Correo electrónico (Opcional)") }}
                            </label>
                            <div class="col-md-8">

                                <input type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') ?: $otra_ocupacion->email }}"
                                    required
                                    placeholder="{{ __("Ingrese correo electrónico lugar ocupación") }}"
                                >

                                @if ( $errors->has('email') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label">
                                {{ __("N° Telefono (opcional)") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                    name="telefono"
                                    id="telefono"
                                    value="{{ old('telefono') ?: $otra_ocupacion->telefono }}"
                                    placeholder="{{ __("Ingrese n° telefono lugar ocupación") }}"
                                >
                                @if ( $errors->has('telefono') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label">
                                {{ __("Cargo/Labor que desempeña") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}"
                                    name="cargo"
                                    id="cargo"
                                    value="{{ old('cargo') ?: $otra_ocupacion->cargo }}"
                                    placeholder="{{ __("Ingrese nombre cargo que desempeña") }}"
                                >
                                @if ( $errors->has('cargo') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="encargado" class="col-md-4 col-form-label">
                                {{ __("Encargado organización/Lugar de trabajo") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('encargado') ? ' is-invalid' : '' }}"
                                    name="encargado"
                                    id="encargado"
                                    value="{{ old('encargado') ?: $otra_ocupacion->encargado }}"
                                    placeholder="{{ __("Ingrese nombre encargado") }}"
                                >
                                @if ( $errors->has('encargado') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('encargado') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

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
                            

                            