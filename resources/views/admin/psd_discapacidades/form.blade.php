
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>

            <li class="item"><a href="{{ route('discapacidadpsd.show', ['id' => $psd->id]) }}">Ficha Discapacidad(es) PSD</a></li>
    
            <li class="item">{{ $discapacidad->id ? __("Editar Ficha Discapacidad PSD") : __("Agregar Ficha Discapacidad PSD") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $discapacidad->id ? route('discapacidadpsd.store') : route('discapacidadpsd.update', ['id' => $discapacidad->id]) }}"
    novalidate
    enctype="multipart/form-data"
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

                        @if ( $discapacidad->id )
                            {{ $discapacidad->psd->nombres }} {{ $discapacidad->psd->apellidos }}
                        @else
                            {{ $discapacidad->nombres }} {{ $discapacidad->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $discapacidad->id ? __("Editar Ficha Discapacidad PSD") : __("Agregar Ficha Discapacidad PSD") }}
                        </h5>

                        @if ( !$discapacidad->id )

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


                        <div class="form-group row my-5">
                            <label for="tipo_discapacidad_id" class="col-md-4 col-form-label">
                                {{ __("Tipo Discapacidad") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('tipo_discapacidad_id') ? ' is-invalid' : '' }}"
                                    name="tipo_discapacidad_id" id="tipo_discapacidad_id"
                                >
                                    <option value="">Seleccione tipo discapacidad</option>
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

                        <hr>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">
                                {{ __("Nombre Discapacidad") }}
                            </label>
                            <div class="col-md-8">

                                <input type="text"
                                    class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                    name="nombre"
                                    id="nombre"
                                    value="{{ old('nombre') ?: $discapacidad->nombre }}"
                                    required
                                    placeholder="{{ __("Ingrese nombre discapacidad") }}"
                                >

                                @if ( $errors->has('nombre') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="observacion" class="col-md-4 col-form-label">
                                {{ __("Observación/descripción discapacidad (opcional)") }}
                            </label>
                            <div class="col-md-8">

                                <textarea 
                                    class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}"
                                    name="observacion" id="observacion" cols="2" rows="3"
                                    placeholder="{{ __("Ingrese observación discapacidad...") }}"
                                > {{ old('observacion') ?: $discapacidad->observacion }} </textarea>

                                @if ( $errors->has('observacion') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('observacion') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="porcentaje_discapacidad" class="col-md-4 col-form-label">
                                {{ __("Porcentaje discapacidad (opcional)") }}
                            </label>

                            <div class="col-md-8">
                                <input type="number"
                                    class="form-control{{ $errors->has('porcentaje_discapacidad') ? ' is-invalid' : '' }}"
                                    name="porcentaje_discapacidad"
                                    id="porcentaje_discapacidad"
                                    value="{{ old('porcentaje_discapacidad') ?: $discapacidad->porcentaje_discapacidad }}"
                                    placeholder="{{ __("Ingrese porcentaje discapacidad") }}"
                                >
                                @if ( $errors->has('porcentaje_discapacidad') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('porcentaje_discapacidad') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <br>

                        <div class="form-group row">

                            <label for="picture" class="col-md-4 col-form-label">
                                {{ __("Subir imagen evidencia (opcional)") }}
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
                            

                            