@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('ingresos.index') }}">Ingresos</a></li>
    
            <li class="item">{{ $ingreso->id ? __("Editar Tipo Ingreso") : __("Agregar Tipo Ingreso") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $ingreso->id ? route('ingresos.store') : route('ingresos.update', ['id' => $ingreso->id]) }}"
            novalidate
        >

            @if ( $ingreso->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $ingreso->id ? __("Editar Tipo Ingreso") : __("Agregar Tipo Ingreso") }}
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
                                        value="{{ old('nombre') ?: $ingreso->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese un nombre para tipo ingreso") }}"
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
                                    <input type="text"
                                        class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                        name="descripcion"
                                        id="descripcion"
                                        value="{{ old('descripcion') ?: $ingreso->descripcion }}"
                                        placeholder="{{ __("Ingrese una descripción") }}"
                                    >
                                    @if ( $errors->has('descripcion') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
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