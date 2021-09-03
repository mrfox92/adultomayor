
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>

            <li class="item"><a href="{{ $salud->id ? route('adultosmayores.show', ['id' => $salud->adultomayor->id] ) : route('adultosmayores.show', ['id' => $adultomayor->id] ) }}">Fichas A.M</a></li>
    
            <li class="item">{{ $salud->id ? __("Editar Ficha Salud AM") : __("Agregar Ficha Salud AM") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $salud->id ? route('salud.store') : route('salud.update', ['id' => $salud->id]) }}"
    novalidate
    >
    
    @if ( $salud->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $salud->id )
                            {{ $salud->adultomayor->nombres }} {{ $salud->adultomayor->apellidos }}
                        @else
                            {{ $salud->nombres }} {{ $salud->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $salud->id ? __("Editar Ficha Salud AM") : __("Agregar Ficha Salud AM") }}
                        </h5>

                        @if ( !$salud->id )

                            <div class="form-group row">
                                <div class="col-md-8">

                                    <input type="hidden"
                                        class="form-control"
                                        name="am_id"
                                        id="am_id"
                                        value="{{ $adultomayor->id }}"
                                    >

                                </div>
                            </div>
                            
                        @endif

                        <hr>

                        <div class="form-group row">
                            <label for="estado_salud" class="col-md-4 col-form-label">
                                {{ __("¿Cómo describiría su estado de salud en general?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('estado_salud') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_salud" id="estado_salud_excelente" value="EXCELENTE" {{ (old('estado_salud') == 'EXCELENTE' | $salud->estado_salud == 'EXCELENTE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_salud_excelente">Muy bueno</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_salud" id="estado_salud_bueno" value="BUENO" {{ (old('estado_salud') == 'BUENO' | $salud->estado_salud == 'BUENO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_salud_bueno">Bueno</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_salud" id="estado_salud_regular" value="REGULAR" {{ (old('estado_salud') == 'REGULAR' | $salud->estado_salud == 'REGULAR') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_salud_regular">Regular (más o menos)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_salud" id="estado_salud_malo" value="MALO" {{ (old('estado_salud') == 'MALO' | $salud->estado_salud == 'MALO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_salud_malo">Malo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_salud" id="estado_salud_muy_malo" value="PESIMO" {{ (old('estado_salud') == 'PESIMO' | $salud->estado_salud == 'PESIMO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_salud_muy_malo">Muy malo</label>
                                </div>
                            </div>

                            @if ( $errors->has('estado_salud') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('estado_salud') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="inscrito_centro_salud" class="col-md-4 col-form-label">
                                {{ __("¿Se encuentra inscrito en un Centro de Salud Primario? (Posta, CESFAM, CECOSF, SAPU o CES)") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('inscrito_centro_salud') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inscrito_centro_salud" id="inscrito_centro_salud_si" value="SI" {{ (old('inscrito_centro_salud') == 'SI' | $salud->inscrito_centro_salud == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="inscrito_centro_salud_si">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inscrito_centro_salud" id="inscrito_centro_salud_otro" value="OTRO" {{ (old('inscrito_centro_salud') == 'OTRO' | $salud->inscrito_centro_salud == 'OTRO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="inscrito_centro_salud_otro">No, porque utiliza otro sistema de salud</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inscrito_centro_salud" id="inscrito_centro_salud_no" value="NO" {{ (old('inscrito_centro_salud') == 'NO' | $salud->inscrito_centro_salud == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="inscrito_centro_salud_no">No</label>
                                </div>
                            </div>

                            @if ( $errors->has('inscrito_centro_salud') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('inscrito_centro_salud') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="controles_salud" class="col-md-4 col-form-label">
                                {{ __("¿Tiene sus controles de salud al día?") }}
                            </label>
                            
                            <div class="col-md-8{{ $errors->has('controles_salud') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="controles_salud" id="controles_salud_si" value="SI" {{ (old('controles_salud') == 'SI' | $salud->controles_salud == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="controles_salud_si">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="controles_salud" id="controles_salud_no" value="NO" {{ (old('controles_salud') == 'NO' | $salud->controles_salud == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="controles_salud_no">No</label>
                                </div>
                            </div>

                            @if ( $errors->has('controles_salud') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('controles_salud') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="dependencia_severa" class="col-md-4 col-form-label">
                                {{ __("¿Se encuentra participando del Programa de Atención Domiciliaria para Personas con Dependencia Severa?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('dependencia_severa') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="dependencia_severa" id="dependencia_severa_si" value="SI" {{ (old('dependencia_severa') == 'SI' | $salud->dependencia_severa == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="dependencia_severa_si">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="dependencia_severa" id="dependencia_severa_no" value="NO" {{ (old('dependencia_severa') == 'NO' | $salud->dependencia_severa == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="dependencia_severa_no">No</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="dependencia_severa" id="dependencia_severa_no_sabe" value="NOSABE" {{ (old('dependencia_severa') == 'NOSABE' | $salud->dependencia_severa == 'NOSABE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="dependencia_severa_no_sabe">No sabe</label>
                                </div>
                            </div>

                            @if ( $errors->has('dependencia_severa') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('dependencia_severa') }}</strong>
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
@endsection
                            

                            