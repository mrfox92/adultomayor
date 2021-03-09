@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('actividades.index') }}">Actividades</a></li>
    
            <li class="item">{{ $actividad->id ? __("Editar Actividad") : __("Agregar Actividad") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $actividad->id ? route('actividades.store') : route('actividades.update', ['id' => $actividad->id]) }}"
            novalidate
        >

            @if ( $actividad->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $actividad->id ? __("Editar Actividad") : __("Agregar Actividad") }}
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
                                        value="{{ old('nombre') ?: $actividad->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese un nombre para actividad") }}"
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
                                        value="{{ old('descripcion') ?: $actividad->descripcion }}"
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
                                <label for="fecha_inicio" class="col-md-4 col-form-label">
                                    {{ __("Fecha Inicio (Opcional)") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="date"
                                        class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}"
                                        name="fecha_inicio"
                                        id="fecha_inicio"
                                        value="{{ old('fecha_inicio') ?: $actividad->fecha_inicio }}"
                                    >

                                    @if ( $errors->has('fecha_inicio') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha_fin" class="col-md-4 col-form-label">
                                    {{ __("Fecha Fin (Opcional)") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="date"
                                        class="form-control{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}"
                                        name="fecha_fin"
                                        id="fecha_fin"
                                        value="{{ old('fecha_fin') ?: $actividad->fecha_fin }}"
                                    >
                                    @if ( $errors->has('fecha_fin') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('fecha_fin') }}</strong>
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