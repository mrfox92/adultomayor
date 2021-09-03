
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>

            <li class="item"><a href="{{ $habitabilidad->id ? route('adultosmayores.show', ['id' => $habitabilidad->adultomayor->id] ) : route('adultosmayores.show', ['id' => $adultomayor->id] ) }}">Fichas A.M</a></li>
            {{-- <li class="item"><a href="{{ route('habitabilidad.index') }}">Fichas Habitabilidad Viviendas A.M</a></li> --}}
    
            <li class="item">{{ $habitabilidad->id ? __("Editar Ficha Habitabilidad Vivienda") : __("Agregar Ficha Habitabilidad Vivienda") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $habitabilidad->id ? route('habitabilidad.store') : route('habitabilidad.update', ['id' => $habitabilidad->id]) }}"
    novalidate
    >
    
    @if ( $habitabilidad->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $habitabilidad->id )
                            {{ $habitabilidad->adultomayor->nombres }} {{ $habitabilidad->adultomayor->apellidos }}
                        @else
                            {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $habitabilidad->id ? __("Editar Ficha habitabilidad vivienda") : __("Agregar Ficha habitabilidad vivienda") }}
                        </h5>

                        @if ( !$habitabilidad->id )

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
                            <label for="fuente_calefaccion" class="col-md-4 col-form-label">
                                {{ __("En relación con la fuente de calefacción de su hogar, usted utiliza:") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('fuente_calefaccion') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fuente_calefaccion" id="fuente_calefaccion_gas" value="GAS" {{ (old('fuente_calefaccion') == 'GAS' | $habitabilidad->fuente_calefaccion == 'GAS') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="fuente_calefaccion_gas">Gas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fuente_calefaccion" id="fuente_calefaccion_parafina" value="PARAFINA" {{ (old('fuente_calefaccion') == 'PARAFINA' | $habitabilidad->fuente_calefaccion == 'PARAFINA') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="fuente_calefaccion_parafina">Parafina</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fuente_calefaccion" id="fuente_calefaccion_electricidad" value="ELECTRICIDAD" {{ (old('fuente_calefaccion') == 'ELECTRICIDAD' | $habitabilidad->fuente_calefaccion == 'ELECTRICIDAD') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="fuente_calefaccion_electricidad">Electricidad</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fuente_calefaccion" id="fuente_calefaccion_lena" value="LENA" {{ (old('fuente_calefaccion') == 'LENA' | $habitabilidad->fuente_calefaccion == 'LENA') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="fuente_calefaccion_lena">Leña</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fuente_calefaccion" id="fuente_calefaccion_carbon" value="CARBON" {{ (old('fuente_calefaccion') == 'CARBON' | $habitabilidad->fuente_calefaccion == 'CARBON') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="fuente_calefaccion_carbon">Carbón</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fuente_calefaccion" id="fuente_calefaccion_solar" value="SOLAR" {{ (old('fuente_calefaccion') == 'SOLAR' | $habitabilidad->fuente_calefaccion == 'SOLAR') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="fuente_calefaccion_solar">Energía Solar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fuente_calefaccion" id="fuente_calefaccion_otra" value="OTRA" {{ (old('fuente_calefaccion') == 'OTRA' | $habitabilidad->fuente_calefaccion == 'OTRA') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="fuente_calefaccion_otra">Otra fuente</label>
                                </div>
                            </div>

                            @if ( $errors->has('fuente_calefaccion') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('fuente_calefaccion') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="estado_piso" class="col-md-4 col-form-label">
                                {{ __("Estado de los pisos") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('estado_piso') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_piso" id="estado_piso_bueno" value="BUENO" {{ (old('estado_piso') == 'BUENO' | $habitabilidad->estado_piso == 'BUENO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_piso_bueno">Bueno</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_piso" id="estado_piso_aceptable" value="ACEPTABLE" {{ (old('estado_piso') == 'ACEPTABLE' | $habitabilidad->estado_piso == 'ACEPTABLE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_piso_aceptable">Aceptable</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_piso" id="estado_piso_malo" value="MALO" {{ (old('estado_piso') == 'MALO' | $habitabilidad->estado_piso == 'MALO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_piso_malo">Malo</label>
                                </div>
                            </div>

                            @if ( $errors->has('estado_piso') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('estado_piso') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="estado_muros" class="col-md-4 col-form-label">
                                {{ __("Estado de los muros") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('estado_muros') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_muros" id="estado_muros_bueno" value="BUENO" {{ (old('estado_muros') == 'BUENO' | $habitabilidad->estado_muros == 'BUENO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_muros_bueno">Bueno</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_muros" id="estado_muros_aceptable" value="ACEPTABLE" {{ (old('estado_muros') == 'ACEPTABLE' | $habitabilidad->estado_muros == 'ACEPTABLE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_muros_aceptable">Aceptable</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_muros" id="estado_muros_malo" value="MALO" {{ (old('estado_muros') == 'MALO' | $habitabilidad->estado_muros == 'MALO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_muros_malo">Malo</label>
                                </div>
                            </div>

                            @if ( $errors->has('estado_muros') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('estado_muros') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="estado_techos" class="col-md-4 col-form-label">
                                {{ __("Estado de los techos") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('estado_techos') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_techos" id="estado_techos_bueno" value="BUENO" {{ (old('estado_techos') == 'BUENO' | $habitabilidad->estado_techos == 'BUENO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_techos_bueno">Bueno</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_techos" id="estado_techos_aceptable" value="ACEPTABLE" {{ (old('estado_techos') == 'ACEPTABLE' | $habitabilidad->estado_techos == 'ACEPTABLE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_techos_aceptable">Aceptable</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_techos" id="estado_techos_malo" value="MALO" {{ (old('estado_techos') == 'MALO' | $habitabilidad->estado_techos == 'MALO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="estado_techos_malo">Malo</label>
                                </div>
                            </div>

                            @if ( $errors->has('estado_techos') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('estado_techos') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row mt-4">
                            <label for="num_dormitorios" class="col-md-4 col-form-label">
                                {{ __("Número de habitaciones que se usan exclusivamente como dormitorio") }}
                            </label>

                            <div class="col-md-8">
                                <input type="number"
                                    class="form-control{{ $errors->has('num_dormitorios') ? ' is-invalid' : '' }}"
                                    name="num_dormitorios"
                                    id="num_dormitorios"
                                    value="{{ old('num_dormitorios') ?: $habitabilidad->num_dormitorios }}"
                                    placeholder="{{ __("Ingrese n° dormitorios") }}"
                                >
                                @if ( $errors->has('num_dormitorios') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('num_dormitorios') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <hr>


                        <div class="form-group row">
                            <label for="camas_cada_integrante" class="col-md-4 col-form-label">
                                {{ __("¿Cuenta con camas para cada uno/a de sus integrantes?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('camas_cada_integrante') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="camas_cada_integrante" id="SI" value="SI" {{ (old('camas_cada_integrante') == 'SI' | $habitabilidad->camas_cada_integrante == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="SI">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="camas_cada_integrante" id="NO" value="NO" {{ (old('camas_cada_integrante') == 'NO' | $habitabilidad->camas_cada_integrante == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="NO">No</label>
                                </div>
                            </div>

                            @if ( $errors->has('camas_cada_integrante') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('camas_cada_integrante') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="seguridad_vivienda" class="col-md-4 col-form-label">
                                {{ __("¿El acceso y desplazamiento por la vivienda es seguro para usted (y su acompañante en caso de que corresponda)?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('seguridad_vivienda') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="seguridad_vivienda" id="seguridad_vivienda_si" value="SI" {{ (old('seguridad_vivienda') == 'SI' | $habitabilidad->seguridad_vivienda == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="seguridad_vivienda_si">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="seguridad_vivienda" id="seguridad_vivienda_medianamente" value="MEDIANAMENTE" {{ (old('seguridad_vivienda') == 'MEDIANAMENTE' | $habitabilidad->seguridad_vivienda == 'MEDIANAMENTE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="seguridad_vivienda_medianamente">Medianamente</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="seguridad_vivienda" id="seguridad_vivienda_no" value="NO" {{ (old('seguridad_vivienda') == 'NO' | $habitabilidad->seguridad_vivienda == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="seguridad_vivienda_no">No</label>
                                </div>
                            </div>

                            @if ( $errors->has('seguridad_vivienda') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('seguridad_vivienda') }}</strong>
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
@endsection
                            

                            