@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('psd.index') }}">PSD</a></li>
    
            <li class="item">{{ $psd->id ? __("Editar Registro PSD") : __("Agregar Registro PSD") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $psd->id ? route('psd.store') : route('psd.update', ['id' => $psd->id]) }}"
            novalidate
            enctype="multipart/form-data"
        >

            @if ( $psd->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $psd->id ? __("Editar Registro PSD") : __("Agregar Registro PSD") }}
                        </div>

                        <hr> 

                        <div class="card-body">

                            <div class="form-group row">

                                <label for="picture" class="col-md-4 col-form-label">
                                    {{ __("Subir foto (opcional)") }}
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
                                <label for="rut" class="col-md-4 col-form-label">
                                    {{ __("Rut") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="text"
                                        class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}"
                                        name="rut"
                                        id="rut"
                                        value="{{ old('rut') ?: $psd->rut }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese rut") }}"
                                    >

                                    @if ( $errors->has('rut') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('rut') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_documento" class="col-md-4 col-form-label">
                                    {{ __("N° Documento") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="text"
                                        class="form-control{{ $errors->has('num_documento') ? ' is-invalid' : '' }}"
                                        name="num_documento"
                                        id="num_documento"
                                        value="{{ old('num_documento') ?: $psd->num_documento }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese N° de documento") }}"
                                    >

                                    @if ( $errors->has('num_documento') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('num_documento') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="nombres" class="col-md-4 col-form-label">
                                    {{ __("Nombres") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="text"
                                        class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}"
                                        name="nombres"
                                        id="nombres"
                                        value="{{ old('nombres') ?: $psd->nombres }}"
                                        required
                                        placeholder="{{ __("Ingrese nombres") }}"
                                    >

                                    @if ( $errors->has('nombres') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombres') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellidos" class="col-md-4 col-form-label">
                                    {{ __("Apellidos") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}"
                                        name="apellidos"
                                        id="apellidos"
                                        value="{{ old('apellidos') ?: $psd->apellidos }}"
                                        placeholder="{{ __("Ingrese apellidos") }}"
                                    >
                                    @if ( $errors->has('apellidos') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('apellidos') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="fecha_nacimiento" class="col-md-4 col-form-label">
                                    {{ __("Fecha Nacimiento") }}
                                </label>

                                <div class="col-md-8">

                                    <input 
                                        type="date"
                                        class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}"
                                        name="fecha_nacimiento"
                                        id="fecha_nacimiento"
                                        value="{{ old('fecha_nacimiento') ?: $psd->fecha_nacimiento }}"
                                    >

                                    {{--  --}}

                                    {{--  --}}

                                    @if ( $errors->has('fecha_nacimiento') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
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
                                        value="{{ old('direccion') ?: $psd->direccion }}"
                                        placeholder="{{ __("Ingrese direccion domicilio") }}"
                                    >
                                    @if ( $errors->has('direccion') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label">
                                    {{ __("N° Telefono (opcional)") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                        name="telefono"
                                        id="telefono"
                                        value="{{ old('telefono') ?: $psd->telefono }}"
                                        placeholder="{{ __("Ingrese n° telefono") }}"
                                    >
                                    @if ( $errors->has('telefono') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="nacionalidad_id" class="col-md-4 col-form-label">
                                    {{ __("Nacionalidad") }}
                                </label>
                                <div class="col-md-8">
                                    <select
                                        class="form-control{{ $errors->has('nacionalidad_id') ? ' is-invalid' : '' }}"
                                        name="nacionalidad_id" id="nacionalidad_id"
                                    >
                                        <option value="">Seleccione nacionalidad</option>
                                        @foreach (\App\Nacionalidad::pluck('nombre', 'id') as $id => $nacionalidad)
                                            <option {{ (int) old('nacionalidad_id') === $id || $psd->nacionalidad_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                                {{ $nacionalidad }}
                                            </option>
                                            
                                        @endforeach

                                        
                                    </select>
                                    @if ( $errors->has('nacionalidad_id') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nacionalidad_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="sexo" class="col-md-4 col-form-label">
                                    {{ __("Sexo") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('sexo') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo_femenino" value="F" {{ (old('sexo') == 'F' | $psd->sexo == 'F') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="sexo_femenino">Femenino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo_masculino" value="M" {{ (old('sexo') == 'M' | $psd->sexo == 'M') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="sexo_masculino">Masculino</label>
                                    </div>
                                </div>

                                @if ( $errors->has('sexo') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="sociedad_civil" class="col-md-4 col-form-label">
                                    {{ __("Participa en organizacion(es) civil(es)") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('sociedad_civil') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sociedad_civil" id="sociedad_civil_si" value="SI" {{ (old('sociedad_civil') == 'SI' | $psd->sociedad_civil == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="sociedad_civil_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sociedad_civil" id="sociedad_civil_no" value="NO" {{ (old('sociedad_civil') == 'NO' | $psd->sociedad_civil == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="sociedad_civil_no">NO</label>
                                    </div>
                                </div>

                                @if ( $errors->has('sociedad_civil') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('sociedad_civil') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="obs_sociedad_civil" class="col-md-4 col-form-label">
                                    {{ __("Observación organizacion(es) civil(es) (opcional)") }}
                                </label>
                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('obs_sociedad_civil') ? ' is-invalid' : '' }}"
                                        name="obs_sociedad_civil" id="obs_sociedad_civil" cols="2" rows="3"
                                        placeholder="{{ __("Ingrese observación organizacion(es) civil(es)...") }}"
                                    > {{ old('obs_sociedad_civil') ?: $psd->obs_sociedad_civil }} </textarea>

                                    @if ( $errors->has('obs_sociedad_civil') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('obs_sociedad_civil') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="recibe_pension" class="col-md-4 col-form-label">
                                    {{ __("¿Recibe Pensión?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('recibe_pension') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recibe_pension" id="recibe_pension_si" value="SI" {{ (old('recibe_pension') == 'SI' | $psd->recibe_pension == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="recibe_pension_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recibe_pension" id="recibe_pension_no" value="NO" {{ (old('recibe_pension') == 'NO' | $psd->recibe_pension == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="recibe_pension_no">NO</label>
                                    </div>
                                </div>

                                @if ( $errors->has('recibe_pension') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('recibe_pension') }}</strong>
                                    </span>
                                @endif

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