@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('programas.index') }}">Programas</a></li>
    
            <li class="item">{{ $programa->id ? __("Editar Programa") : __("Agregar Programa") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $programa->id ? route('programas.store') : route('programas.update', ['id' => $programa->id]) }}"
            novalidate
        >

            @if ( $programa->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $programa->id ? __("Editar Programa") : __("Agregar Programa") }}
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
                                        value="{{ old('nombre') ?: $programa->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese un nombre para programa") }}"
                                    >

                                    @if ( $errors->has('nombre') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label">
                                    {{ __("Descripción") }}
                                </label>

                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                        name="descripcion" id="descripcion" cols="3" rows="4"

                                    >{{ old('descripcion') ?: $programa->descripcion }}</textarea>

                                    @if ( $errors->has('descripcion') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="objetivo" class="col-md-4 col-form-label">
                                    {{ __("Objetivo(s) (Opcional)") }}
                                </label>

                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('objetivo') ? ' is-invalid' : '' }}"
                                        name="objetivo" id="objetivo" cols="3" rows="4"

                                    >{{ old('objetivo') ?: $programa->objetivo }}</textarea>

                                    @if ( $errors->has('objetivo') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('objetivo') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="requisitos" class="col-md-4 col-form-label">
                                    {{ __("Requisito(s) (Opcional)") }}
                                </label>

                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('requisitos') ? ' is-invalid' : '' }}"
                                        name="requisitos" id="requisitos" cols="3" rows="4"
                                    >{{ old('requisitos') ?: $programa->requisitos }}</textarea>

                                    @if ( $errors->has('requisitos') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('requisitos') }}</strong>
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