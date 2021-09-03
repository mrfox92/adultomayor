
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ $autonomia->id ? route('adultosmayores.show', ['id' => $autonomia->adultomayor->id] ) : route('adultosmayores.show', ['id' => $adultomayor->id] ) }}">Fichas A.M</a></li>
    
            <li class="item">{{ $autonomia->id ? __("Editar Ficha Actividades de la vida diaria") : __("Agregar Ficha Actividades de la vida diaria") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $autonomia->id ? route('autonomia.store') : route('autonomia.update', ['id' => $autonomia->id]) }}"
    novalidate
    >
    
    @if ( $autonomia->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $autonomia->id )
                            {{ $autonomia->adultomayor->nombres }} {{ $autonomia->adultomayor->apellidos }}
                        @else
                            {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $autonomia->id ? __("Editar Ficha Actividades de la vida diaria") : __("Agregar Ficha Actividades de la vida diaria") }}
                        </h5>

                        @if ( !$autonomia->id )

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
                        
                        <div class="form-group row">
                            <label for="levantarse_sin_ayuda" class="col-md-4 col-form-label">
                                {{ __("1. ¿Puede levantarse sin ayuda?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('levantarse_sin_ayuda') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="levantarse_sin_ayuda" id="levantarse_sin_ayuda" value="NO" {{ (old('levantarse_sin_ayuda') == 'NO' | $autonomia->levantarse_sin_ayuda == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="levantarse_sin_ayuda">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="levantarse_sin_ayuda" id="levantarse_sin_ayuda" value="SI" {{ (old('levantarse_sin_ayuda') == 'SI' | $autonomia->levantarse_sin_ayuda == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="levantarse_sin_ayuda">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('levantarse_sin_ayuda') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('levantarse_sin_ayuda') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="cama_aseo_dormitorio" class="col-md-4 col-form-label">
                                {{ __("2. ¿Puede hacer su cama y el aseo de su dormitorio?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('cama_aseo_dormitorio') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cama_aseo_dormitorio" id="cama_aseo_dormitorio" value="NO" {{ (old('cama_aseo_dormitorio') == 'NO' | $autonomia->cama_aseo_dormitorio == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="cama_aseo_dormitorio">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cama_aseo_dormitorio" id="cama_aseo_dormitorio" value="SI" {{ (old('cama_aseo_dormitorio') == 'SI' | $autonomia->cama_aseo_dormitorio == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="cama_aseo_dormitorio">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('cama_aseo_dormitorio') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('cama_aseo_dormitorio') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="asearse_ducharse" class="col-md-4 col-form-label">
                                {{ __("3. ¿Asearse y bañarse/ducharse?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('asearse_ducharse') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="asearse_ducharse" id="asearse_ducharse" value="NO" {{ (old('asearse_ducharse') == 'NO' | $autonomia->asearse_ducharse == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="asearse_ducharse">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="asearse_ducharse" id="asearse_ducharse" value="SI" {{ (old('asearse_ducharse') == 'SI' | $autonomia->asearse_ducharse == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="asearse_ducharse">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('asearse_ducharse') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('asearse_ducharse') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="vestirse" class="col-md-4 col-form-label">
                                {{ __("4. ¿Vestirse?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('vestirse') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vestirse" id="vestirse" value="NO" {{ (old('vestirse') == 'NO' | $autonomia->vestirse == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="vestirse">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vestirse" id="vestirse" value="SI" {{ (old('vestirse') == 'SI' | $autonomia->vestirse == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="vestirse">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('vestirse') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('vestirse') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="peinarse" class="col-md-4 col-form-label">
                                {{ __("5. ¿Peinarse?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('peinarse') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="peinarse" id="peinarse" value="NO" {{ (old('peinarse') == 'NO' | $autonomia->peinarse == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="peinarse">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="peinarse" id="peinarse" value="SI" {{ (old('peinarse') == 'SI' | $autonomia->peinarse == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="peinarse">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('peinarse') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('peinarse') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="lavarse_dientes" class="col-md-4 col-form-label">
                                {{ __("6. ¿Lavarse los dientes?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('lavarse_dientes') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lavarse_dientes" id="lavarse_dientes" value="NO" {{ (old('lavarse_dientes') == 'NO' | $autonomia->lavarse_dientes == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="lavarse_dientes">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lavarse_dientes" id="lavarse_dientes" value="SI" {{ (old('lavarse_dientes') == 'SI' | $autonomia->lavarse_dientes == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="lavarse_dientes">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('lavarse_dientes') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('lavarse_dientes') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="utilizar_wc" class="col-md-4 col-form-label">
                                {{ __("7. ¿Puede utilizar el WC o retrete?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('utilizar_wc') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="utilizar_wc" id="utilizar_wc" value="NO" {{ (old('utilizar_wc') == 'NO' | $autonomia->utilizar_wc == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="utilizar_wc">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="utilizar_wc" id="utilizar_wc" value="SI" {{ (old('utilizar_wc') == 'SI' | $autonomia->utilizar_wc == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="utilizar_wc">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('utilizar_wc') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('utilizar_wc') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="desplazamiento_dentro_casa" class="col-md-4 col-form-label">
                                {{ __("8. ¿Puede moverse o desplazarse dentro de su casa?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('desplazamiento_dentro_casa') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="desplazamiento_dentro_casa" id="desplazamiento_dentro_casa" value="NO" {{ (old('desplazamiento_dentro_casa') == 'NO' | $autonomia->desplazamiento_dentro_casa == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="desplazamiento_dentro_casa">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="desplazamiento_dentro_casa" id="desplazamiento_dentro_casa" value="SI" {{ (old('desplazamiento_dentro_casa') == 'SI' | $autonomia->desplazamiento_dentro_casa == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="desplazamiento_dentro_casa">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('desplazamiento_dentro_casa') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('desplazamiento_dentro_casa') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="comer_solo" class="col-md-4 col-form-label">
                                {{ __("9. ¿Puede comer solo?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('comer_solo') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="comer_solo" id="comer_solo" value="NO" {{ (old('comer_solo') == 'NO' | $autonomia->comer_solo == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="comer_solo">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="comer_solo" id="comer_solo" value="SI" {{ (old('comer_solo') == 'SI' | $autonomia->comer_solo == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="comer_solo">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('comer_solo') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('comer_solo') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="tomarse_medicamentos" class="col-md-4 col-form-label">
                                {{ __("10. ¿Puede tomarse los medicamentos en dosis y horarios sin que le recuerden o le supervisen?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('tomarse_medicamentos') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tomarse_medicamentos" id="tomarse_medicamentos" value="NO" {{ (old('tomarse_medicamentos') == 'NO' | $autonomia->tomarse_medicamentos == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="tomarse_medicamentos">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tomarse_medicamentos" id="tomarse_medicamentos" value="SI" {{ (old('tomarse_medicamentos') == 'SI' | $autonomia->tomarse_medicamentos == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="tomarse_medicamentos">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('tomarse_medicamentos') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('tomarse_medicamentos') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="salir_calle" class="col-md-4 col-form-label">
                                {{ __("11. ¿Puede salir a la calle?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('salir_calle') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="salir_calle" id="salir_calle" value="NO" {{ (old('salir_calle') == 'NO' | $autonomia->salir_calle == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="salir_calle">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="salir_calle" id="salir_calle" value="SI" {{ (old('salir_calle') == 'SI' | $autonomia->salir_calle == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="salir_calle">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('salir_calle') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('salir_calle') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="realizar_compras" class="col-md-4 col-form-label">
                                {{ __("12. ¿Puede realizar compras?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('realizar_compras') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="realizar_compras" id="realizar_compras" value="NO" {{ (old('realizar_compras') == 'NO' | $autonomia->realizar_compras == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="realizar_compras">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="realizar_compras" id="realizar_compras" value="SI" {{ (old('realizar_compras') == 'SI' | $autonomia->realizar_compras == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="realizar_compras">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('realizar_compras') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('realizar_compras') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="uso_medios_transporte" class="col-md-4 col-form-label">
                                {{ __("13. ¿Puede utilizar medios de transporte?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('uso_medios_transporte') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="uso_medios_transporte" id="uso_medios_transporte" value="NO" {{ (old('uso_medios_transporte') == 'NO' | $autonomia->uso_medios_transporte == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="uso_medios_transporte">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="uso_medios_transporte" id="uso_medios_transporte" value="SI" {{ (old('uso_medios_transporte') == 'SI' | $autonomia->uso_medios_transporte == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="uso_medios_transporte">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('uso_medios_transporte') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('uso_medios_transporte') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="medico_controles_salud" class="col-md-4 col-form-label">
                                {{ __("14. ¿Puede ir al médico o a sus controles de salud?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('medico_controles_salud') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="medico_controles_salud" id="medico_controles_salud" value="NO" {{ (old('medico_controles_salud') == 'NO' | $autonomia->medico_controles_salud == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="medico_controles_salud">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="medico_controles_salud" id="medico_controles_salud" value="SI" {{ (old('medico_controles_salud') == 'SI' | $autonomia->medico_controles_salud == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="medico_controles_salud">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('medico_controles_salud') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('medico_controles_salud') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="colaborar_tareas_hogar" class="col-md-4 col-form-label">
                                {{ __("15. ¿Puede realizar o colaborar en las tareas del hogar?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('colaborar_tareas_hogar') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="colaborar_tareas_hogar" id="colaborar_tareas_hogar" value="NO" {{ (old('colaborar_tareas_hogar') == 'NO' | $autonomia->colaborar_tareas_hogar == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="colaborar_tareas_hogar">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="colaborar_tareas_hogar" id="colaborar_tareas_hogar" value="SI" {{ (old('colaborar_tareas_hogar') == 'SI' | $autonomia->colaborar_tareas_hogar == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="colaborar_tareas_hogar">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('colaborar_tareas_hogar') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('colaborar_tareas_hogar') }}</strong>
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
                            

                            