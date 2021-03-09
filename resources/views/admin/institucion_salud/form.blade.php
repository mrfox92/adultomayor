@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('institucionsalud.index') }}">Institución Salud</a></li>
    
            <li class="item">{{ $institucion_salud->id ? __("Editar Institución Salud") : __("Agregar Institución Salud") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $institucion_salud->id ? route('institucionsalud.store') : route('institucionsalud.update', ['id' => $institucion_salud->id]) }}"
            novalidate
        >

            @if ( $institucion_salud->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $institucion_salud->id ? __("Editar Institución Salud") : __("Agregar Institución Salud") }}
                        </div>
                        <hr>    
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label">
                                    {{ __("Nombre") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="text"
                                        class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                        name="nombre"
                                        id="nombre"
                                        value="{{ old('nombre') ?: $institucion_salud->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese nombre institución salud") }}"
                                    >

                                    @if ( $errors->has('nombre') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="direccion" class="col-md-4 col-form-label">
                                    {{ __("Dirección") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                        name="direccion"
                                        id="direccion"
                                        value="{{ old('direccion') ?: $institucion_salud->direccion }}"
                                        placeholder="{{ __("Ingrese una descripción") }}"
                                    >
                                    @if ( $errors->has('direccion') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="localidad" class="col-md-4 col-form-label">
                                    {{ __("Localidad") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control{{ $errors->has('localidad') ? ' is-invalid' : '' }}"
                                        name="localidad"
                                        id="localidad"
                                        value="{{ old('localidad') ?: $institucion_salud->localidad }}"
                                        placeholder="{{ __("Ingrese una localidad") }}"
                                    >
                                    @if ( $errors->has('localidad') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('localidad') }}</strong>
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
</div>
@endsection