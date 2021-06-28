@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('adultosmayores.index') }}">Adultos Mayores</a></li>
    
            <li class="item">{{ $adultomayor->id ? __("Editar Registro Adulto Mayor") : __("Agregar Registro Adulto Mayor") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $adultomayor->id ? route('adultosmayores.store') : route('adultosmayores.update', ['id' => $adultomayor->id]) }}"
            novalidate
        >

            @if ( $adultomayor->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $adultomayor->id ? __("Editar Registro Adulto Mayor") : __("Agregar Registro Adulto Mayor") }}
                        </div>

                        <hr> 

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="rut" class="col-md-4 col-form-label">
                                    {{ __("Rut") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="text"
                                        class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}"
                                        name="rut"
                                        id="rut"
                                        value="{{ old('rut') ?: $adultomayor->rut }}"
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
                                        value="{{ old('num_documento') ?: $adultomayor->num_documento }}"
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
                                        value="{{ old('nombres') ?: $adultomayor->nombres }}"
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
                                        value="{{ old('apellidos') ?: $adultomayor->apellidos }}"
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
                                        value="{{ old('fecha_nacimiento') ?: $adultomayor->fecha_nacimiento }}"
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
                                        value="{{ old('direccion') ?: $adultomayor->direccion }}"
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
                                        value="{{ old('telefono') ?: $adultomayor->telefono }}"
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
                                            <option {{ (int) old('nacionalidad_id') === $id || $adultomayor->nacionalidad_id === $id ? 'selected' : '' }} value="{{ $id }}">
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

                            <div class="form-group row">
                                <label for="alfabetizacion_id" class="col-md-4 col-form-label">
                                    {{ __("Nivel Alfabetización") }}
                                </label>
                                <div class="col-md-8">
                                    <select
                                        class="form-control{{ $errors->has('alfabetizacion_id') ? ' is-invalid' : '' }}"
                                        name="alfabetizacion_id" id="alfabetizacion_id"
                                    >
                                        <option value="">Seleccione nivel alfabetización</option>
                                        @foreach (\App\Alfabetizacion::pluck('nombre', 'id') as $id => $alfabetizacion)
                                            <option {{ (int) old('alfabetizacion_id') === $id || $adultomayor->alfabetizacion_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                                {{ $alfabetizacion }}
                                            </option>
                                            
                                        @endforeach

                                        
                                    </select>
                                    @if ( $errors->has('alfabetizacion_id') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('alfabetizacion_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="porcentaje_rsh" class="col-md-4 col-form-label">
                                    {{ __("Porcentaje RSH (opcional)") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="number"
                                        class="form-control{{ $errors->has('porcentaje_rsh') ? ' is-invalid' : '' }}"
                                        name="porcentaje_rsh"
                                        id="porcentaje_rsh"
                                        value="{{ old('porcentaje_rsh') ?: $adultomayor->porcentaje_rsh }}"
                                        placeholder="{{ __("Ingrese porcentaje rsh") }}"
                                    >
                                    @if ( $errors->has('porcentaje_rsh') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('porcentaje_rsh') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="estado_club_am" class="col-md-4 col-form-label">
                                    {{ __("Club Adulto Mayor") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('estado_club_am') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="estado_club_am" id="estado_club_am" value="No participa" {{ (old('estado_club_am') == 'No participa' | $adultomayor->estado_club_am == 'No participa') ? 'checked' : ''}} >
                                        <label class="form-check-label col-form-label" for="estado_club_am">No participa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="estado_club_am" id="estado_club_am" value="Quiere participar" {{ (old('estado_club_am') == 'Quiere participar' | $adultomayor->estado_club_am == 'Quiere participar') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="estado_club_am">Quiere participar</label>
                                    </div>
                                </div>

                                @if ( $errors->has('estado_club_am') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('estado_club_am') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="tipo_vivienda_id" class="col-md-4 col-form-label">
                                    {{ __("Tipo Vivienda") }}
                                </label>
                                <div class="col-md-8">
                                    <select
                                        class="form-control{{ $errors->has('tipo_vivienda_id') ? ' is-invalid' : '' }}"
                                        name="tipo_vivienda_id" id="tipo_vivienda_id"
                                    >
                                        <option value="">Seleccione tipo Vivienda</option>
                                        @foreach (\App\TipoVivienda::pluck('nombre', 'id') as $id => $tipovivienda)
                                            <option {{ (int) old('tipo_vivienda_id') === $id || $adultomayor->tipo_vivienda_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                                {{ $tipovivienda }}
                                            </option>
                                            
                                        @endforeach
                                        
                                    </select>
                                    @if ( $errors->has('tipo_vivienda_id') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('tipo_vivienda_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nucleo_familiar_id" class="col-md-4 col-form-label">
                                    {{ __("Núcleo Familiar") }}
                                </label>
                                <div class="col-md-8">
                                    <select
                                        class="form-control{{ $errors->has('nucleo_familiar_id') ? ' is-invalid' : '' }}"
                                        name="nucleo_familiar_id" id="nucleo_familiar_id"
                                    >
                                        <option value="">Seleccione núcleo familiar</option>
                                        @foreach (\App\NucleoFamiliar::pluck('nombre', 'id') as $id => $nucleofamiliar)
                                            <option {{ (int) old('nucleo_familiar_id') === $id || $adultomayor->nucleo_familiar_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                                {{ $nucleofamiliar }}
                                            </option>
                                            
                                        @endforeach
                                        
                                    </select>
                                    @if ( $errors->has('nucleo_familiar_id') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nucleo_familiar_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="recibe_medicamentos" class="col-md-4 col-form-label">
                                    {{ __("¿Recibe medicamentos?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('recibe_medicamentos') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recibe_medicamentos" id="recibe_medicamentos" value="NO" {{ (old('recibe_medicamentos') == 'NO' | $adultomayor->recibe_medicamentos == 'NO') ? 'checked' : ''}}>
                                        {{-- <input class="form-check-input" type="radio" name="recibe_medicamentos" id="recibe_medicamentos" value="NO" {{ (old('recibe_medicamentos') == 'NO') ? 'checked' : ''}}> --}}
                                        <label class="form-check-label col-form-label" for="recibe_medicamentos">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recibe_medicamentos" id="recibe_medicamentos" value="SI" {{ (old('recibe_medicamentos') == 'SI' | $adultomayor->recibe_medicamentos == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="recibe_medicamentos">SI</label>
                                    </div>
                                </div>

                                @if ( $errors->has('recibe_medicamentos') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('recibe_medicamentos') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="obs_medicamentos" class="col-md-4 col-form-label">
                                    {{ __("Observación medicamentos (opcional)") }}
                                </label>
                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('obs_medicamentos') ? ' is-invalid' : '' }}"
                                        name="obs_medicamentos" id="obs_medicamentos" cols="2" rows="3"
                                        placeholder="{{ __("Ingrese observación medicamentos...") }}"
                                    > {{ old('obs_medicamentos') ?: $adultomayor->obs_medicamentos }} </textarea>

                                    @if ( $errors->has('obs_medicamentos') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('obs_medicamentos') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="emprendimiento" class="col-md-4 col-form-label">
                                    {{ __("¿Tiene emprendimiento?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('emprendimiento') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="emprendimiento" id="emprendimiento" value="NO" {{ (old('emprendimiento') == 'NO' | $adultomayor->emprendimiento == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="emprendimiento">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="emprendimiento" id="emprendimiento" value="SI" {{ (old('emprendimiento') == 'SI' | $adultomayor->emprendimiento == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="emprendimiento">SI</label>
                                    </div>
                                </div>

                                @if ( $errors->has('emprendimiento') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('emprendimiento') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group row">
                                <label for="obs_emprendimiento" class="col-md-4 col-form-label">
                                    {{ __("Observación emprendimiento (opcional)") }}
                                </label>
                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('obs_emprendimiento') ? ' is-invalid' : '' }}"
                                        name="obs_emprendimiento" id="obs_emprendimiento" cols="2" rows="3"
                                        placeholder="{{ __("Ingrese observación emprendimiento...") }}"
                                    > {{ old('obs_emprendimiento') ?: $adultomayor->obs_emprendimiento }} </textarea>

                                    @if ( $errors->has('obs_emprendimiento') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('obs_emprendimiento') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="atencion_panales" class="col-md-4 col-form-label">
                                    {{ __("¿Necesita atención pañales?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('atencion_panales') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="atencion_panales" id="atencion_panales" value="NO" {{ (old('atencion_panales') == 'NO' | $adultomayor->atencion_panales == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="atencion_panales">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="atencion_panales" id="atencion_panales" value="SI" {{ (old('atencion_panales') == 'SI' | $adultomayor->atencion_panales == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="atencion_panales">SI</label>
                                    </div>
                                </div>

                                @if ( $errors->has('atencion_panales') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('atencion_panales') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group row">
                                <label for="obs_atencion_panales" class="col-md-4 col-form-label">
                                    {{ __("Observación atención pañales") }}
                                </label>
                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('obs_atencion_panales') ? ' is-invalid' : '' }}"
                                        name="obs_atencion_panales" id="obs_atencion_panales" cols="2" rows="3"
                                        placeholder="{{ __("Ingrese observación atención pañales...") }}"
                                    > {{ old('obs_atencion_panales') ?: $adultomayor->obs_atencion_panales }} </textarea>

                                    @if ( $errors->has('obs_atencion_panales') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('obs_atencion_panales') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="postrado" class="col-md-4 col-form-label">
                                    {{ __("¿Está postrado?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('postrado') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="postrado" id="postrado" value="NO" {{ (old('postrado') == 'NO' | $adultomayor->postrado == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="postrado">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="postrado" id="postrado" value="SI" {{ (old('postrado') == 'SI' | $adultomayor->postrado == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="postrado">SI</label>
                                    </div>
                                </div>

                                @if ( $errors->has('postrado') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('postrado') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                
                                <label for="obs_postrado" class="col-md-4 col-form-label">
                                    {{ __("Observación postrado") }}
                                </label>

                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('obs_postrado') ? ' is-invalid' : '' }}"
                                        name="obs_postrado" id="obs_postrado" cols="2" rows="3"
                                        placeholder="{{ __("Ingrese observación postrado...") }}"
                                    > {{ old('obs_postrado') ?: $adultomayor->obs_postrado }} </textarea>

                                    @if ( $errors->has('obs_postrado') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('obs_postrado') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="habitabilidad_casa" class="col-md-4 col-form-label">
                                    {{ __("¿Habitabilidad casa?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('habitabilidad_casa') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="habitabilidad_casa" id="habitabilidad_casa" value="NO" {{ (old('habitabilidad_casa') == 'NO' | $adultomayor->habitabilidad_casa == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="habitabilidad_casa">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="habitabilidad_casa" id="habitabilidad_casa" value="SI" {{ (old('habitabilidad_casa') == 'SI' | $adultomayor->habitabilidad_casa == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="habitabilidad_casa">SI</label>
                                    </div>
                                </div>

                                @if ( $errors->has('habitabilidad_casa') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('habitabilidad_casa') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group row">
                                <label for="obs_hab_casa" class="col-md-4 col-form-label">
                                    {{ __("Observación habitabilidad casa (opcional)") }}
                                </label>
                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('obs_hab_casa') ? ' is-invalid' : '' }}"
                                        name="obs_hab_casa" id="obs_hab_casa" cols="2" rows="3"
                                        placeholder="{{ __("Ingrese observación habitabilidad casa...") }}"
                                    > {{ old('obs_hab_casa') ?: $adultomayor->obs_hab_casa }} </textarea>

                                    @if ( $errors->has('obs_hab_casa') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('obs_hab_casa') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="postulacion_fosis" class="col-md-4 col-form-label">
                                    {{ __("¿Postulación FOSIS?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('postulacion_fosis') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="postulacion_fosis" id="postulacion_fosis" value="NO" {{ (old('postulacion_fosis') == 'NO' | $adultomayor->postulacion_fosis == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="postulacion_fosis">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="postulacion_fosis" id="postulacion_fosis" value="SI" {{ (old('postulacion_fosis') == 'SI' | $adultomayor->postulacion_fosis == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="postulacion_fosis">SI</label>
                                    </div>
                                </div>

                                @if ( $errors->has('postulacion_fosis') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('postulacion_fosis') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group row">
                                <label for="obs_fosis" class="col-md-4 col-form-label">
                                    {{ __("Observación FOSIS (opcional)") }}
                                </label>
                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('obs_fosis') ? ' is-invalid' : '' }}"
                                        name="obs_fosis" id="obs_fosis" cols="2" rows="3"
                                        placeholder="{{ __("Ingrese observación FOSIS...") }}"
                                    > {{ old('obs_fosis') ?: $adultomayor->obs_fosis }} </textarea>

                                    @if ( $errors->has('obs_fosis') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('obs_fosis') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>
                            {{--  --}}

                            <div class="form-group row">
                                <label for="vacunado" class="col-md-4 col-form-label">
                                    {{ __("¿Está vacunado contra el COVID-19?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('vacunado') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vacunado" id="vacunado" value="NO" {{ (old('vacunado') == 'NO' | $adultomayor->vacunado == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="vacunado">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vacunado" id="vacunado" value="SI" {{ (old('vacunado') == 'SI' | $adultomayor->vacunado == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="vacunado">SI</label>
                                    </div>
                                </div>

                                @if ( $errors->has('vacunado') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('vacunado') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group row">
                                <label for="obs_vacunado" class="col-md-4 col-form-label">
                                    {{ __("Observación sobre vacuna (opcional)") }}
                                </label>
                                <div class="col-md-8">

                                    <textarea 
                                        class="form-control{{ $errors->has('obs_vacunado') ? ' is-invalid' : '' }}"
                                        name="obs_vacunado" id="obs_vacunado" cols="2" rows="3"
                                        placeholder="{{ __("Ingrese observación sobre vacuna...") }}"
                                    > {{ old('obs_vacunado') ?: $adultomayor->obs_vacunado }} </textarea>

                                    @if ( $errors->has('obs_vacunado') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('obs_vacunado') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            {{--  --}}

                            <hr>

                            <div class="form-group row">
                                <label for="fecha_postulacion_fosis" class="col-md-4 col-form-label">
                                    {{ __("Fecha postulación FOSIS (opcional)") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="date"
                                        class="form-control{{ $errors->has('fecha_postulacion_fosis') ? ' is-invalid' : '' }}"
                                        name="fecha_postulacion_fosis"
                                        id="fecha_postulacion_fosis"
                                        value="{{ old('fecha_postulacion_fosis') ?: $adultomayor->fecha_postulacion_fosis }}"
                                    >

                                    @if ( $errors->has('fecha_postulacion_fosis') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('fecha_postulacion_fosis') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="cuidado_ninos" class="col-md-4 col-form-label">
                                    {{ __("¿Se encuentra a cargo del cuidado de niños/as y/o una persona enferma o que requiere cuidados permanentes?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('cuidado_ninos') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cuidado_ninos" id="cuidado_ninos" value="SI" {{ (old('cuidado_ninos') == 'SI' | $adultomayor->cuidado_ninos == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="cuidado_ninos">Si, tiempo completo</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cuidado_ninos" id="cuidado_ninos" value="A VECES" {{ (old('cuidado_ninos') == 'A VECES' | $adultomayor->cuidado_ninos == 'A VECES') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="cuidado_ninos">SI, algunas veces a la semana</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cuidado_ninos" id="cuidado_ninos" value="RARA VEZ" {{ (old('cuidado_ninos') == 'RARA VEZ' | $adultomayor->cuidado_ninos == 'RARA VEZ') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="cuidado_ninos">Rara vez</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cuidado_ninos" id="cuidado_ninos" value="NO" {{ (old('cuidado_ninos') == 'NO' | $adultomayor->cuidado_ninos == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="cuidado_ninos">Nunca</label>
                                    </div>
                                </div>

                                @if ( $errors->has('cuidado_ninos') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('cuidado_ninos') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <hr>

                            <div class="form-group row">
                                <label for="cuidado_psd" class="col-md-4 col-form-label">
                                    {{ __("¿Se encuentra a cargo del cuidado de alguna persona en situación de discapacidad?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('cuidado_psd') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cuidado_psd" id="cuidado_psd" value="NO" {{ (old('cuidado_psd') == 'NO' | $adultomayor->cuidado_psd == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="cuidado_psd">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cuidado_psd" id="cuidado_psd" value="SI" {{ (old('cuidado_psd') == 'SI' | $adultomayor->cuidado_psd == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="cuidado_psd">SI</label>
                                    </div>
                                </div>

                                @if ( $errors->has('cuidado_psd') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('cuidado_psd') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="inscripcion_conadi" class="col-md-4 col-form-label">
                                    {{ __("¿Se encuentra inscrito/a en CONADI?") }}
                                </label>

                                <div class="col-md-8{{ $errors->has('inscripcion_conadi') ? ' is-invalid' : '' }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inscripcion_conadi" id="inscripcion_conadi" value="SI" {{ (old('inscripcion_conadi') == 'SI' | $adultomayor->inscripcion_conadi == 'SI') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="inscripcion_conadi">Si</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inscripcion_conadi" id="inscripcion_conadi" value="NO" {{ (old('inscripcion_conadi') == 'NO' | $adultomayor->inscripcion_conadi == 'NO') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="inscripcion_conadi">No</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inscripcion_conadi" id="inscripcion_conadi" value="NO SABE" {{ (old('inscripcion_conadi') == 'NO SABE' | $adultomayor->inscripcion_conadi == 'NO SABE') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="inscripcion_conadi">No sabe</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inscripcion_conadi" id="inscripcion_conadi" value="NO APLICA" {{ (old('inscripcion_conadi') == 'NO APLICA' | $adultomayor->inscripcion_conadi == 'NO APLICA') ? 'checked' : ''}}>
                                        <label class="form-check-label col-form-label" for="inscripcion_conadi">No aplica</label>
                                    </div>
                                </div>

                                @if ( $errors->has('inscripcion_conadi') )
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('inscripcion_conadi') }}</strong>
                                    </span>
                                @endif

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