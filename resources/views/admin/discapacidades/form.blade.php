@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('discapacidades.index') }}">Discapacidades</a></li>
    
            <li class="item">{{ $discapacidad->id ? __("Editar Discapacidad") : __("Agregar Discapacidad") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $discapacidad->id ? route('discapacidades.store') : route('discapacidades.update', ['id' => $discapacidad->id]) }}"
            novalidate
        >

            @if ( $discapacidad->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $discapacidad->id ? __("Editar Discapacidad") : __("Agregar Discapacidad") }}
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
                                        value="{{ old('nombre') ?: $discapacidad->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese un nombre discapacidad") }}"
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
                                        value="{{ old('descripcion') ?: $discapacidad->descripcion }}"
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
                                <label for="tipo_discapacidad" class="col-md-4 col-form-label">
                                    {{ __("Tipo Discapacidad") }}
                                </label>
                                <div class="col-md-8">
                                    <select
                                        class="form-control{{ $errors->has('tipo_discapacidad_id') ? ' is-invalid' : '' }}"
                                        name="tipo_discapacidad_id" id="tipo_discapacidad_id"
                                    >
                                        <option value="">Seleccione tipo</option>
                                        @foreach (\App\TipoDiscapacidad::pluck('nombre', 'id') as $id => $tipo_discapacidad)
                                            <option {{ (int) old('tipo_discapacidad_id') === $id || $discapacidad->tipo_discapacidad_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                                {{ $tipo_discapacidad }}
                                            </option>
                                            
                                        @endforeach

                                        
                                    </select>
                                    @if ( $errors->has('tipo_discapacidad_id') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('tipo_discapacidad_id') }}</strong>
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