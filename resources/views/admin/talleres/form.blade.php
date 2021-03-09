@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('talleres.index') }}">Talleres</a></li>
    
            <li class="item">{{ $taller->id ? __("Editar Taller") : __("Agregar Taller") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $taller->id ? route('talleres.store') : route('talleres.update', ['id' => $taller->id]) }}"
            novalidate
        >

            @if ( $taller->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $taller->id ? __("Editar Taller") : __("Agregar Taller") }}
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
                                        value="{{ old('nombre') ?: $taller->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese un nombre para tipo taller") }}"
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
                                        value="{{ old('descripcion') ?: $taller->descripcion }}"
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
                                <label for="tipo_taller" class="col-md-4 col-form-label">
                                    {{ __("Tipo Taller") }}
                                </label>
                                <div class="col-md-8">
                                    <select
                                        class="form-control{{ $errors->has('tipo_taller_id') ? ' is-invalid' : '' }}"
                                        name="tipo_taller_id" id="tipo_taller_id"
                                    >
                                        <option value="">Seleccione tipo</option>
                                        @foreach (\App\TipoTaller::pluck('nombre', 'id') as $id => $tipoTaller)
                                            <option {{ (int) old('tipo_taller_id') === $id || $taller->tipo_taller_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                                {{ $tipoTaller }}
                                            </option>
                                            
                                        @endforeach

                                        
                                    </select>
                                    @if ( $errors->has('tipo_taller_id') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('tipo_taller_id') }}</strong>
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
                                        value="{{ old('fecha_inicio') ?: $taller->fecha_inicio }}"
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
                                        value="{{ old('fecha_fin') ?: $taller->fecha_fin }}"
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