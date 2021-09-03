
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>

            <li class="item"><a href="{{ $acompanante->id ? route('adultosmayores.show', ['id' => $acompanante->adultomayor->id] ) : route('adultosmayores.show', ['id' => $adultomayor->id] ) }}">Fichas A.M</a></li>
    
    
            <li class="item">{{ $acompanante->id ? __("Editar Ficha Acompañante AM") : __("Agregar Ficha Acompañante AM") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $acompanante->id ? route('acompanante.store') : route('acompanante.update', ['id' => $acompanante->id]) }}"
    novalidate
    >
    
    @if ( $acompanante->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $acompanante->id )
                            {{ $acompanante->adultomayor->nombres }} {{ $acompanante->adultomayor->apellidos }}
                        @else
                            {{ $acompanante->nombres }} {{ $acompanante->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $acompanante->id ? __("Editar Ficha Acompañante AM") : __("Agregar Ficha Acompañante AM") }}
                        </h5>

                        @if ( !$acompanante->id )

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
                            <label for="sexo_acompanante" class="col-md-4 col-form-label">
                                {{ __("Sexo de él/la acompañante") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('sexo_acompanante') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo_acompanante" id="sexo_femenino" value="F" {{ (old('sexo_acompanante') == 'F' | $acompanante->sexo_acompanante == 'F') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="sexo_femenino">Femenino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo_acompanante" id="sexo_masculino" value="M" {{ (old('sexo_acompanante') == 'M' | $acompanante->sexo_acompanante == 'M') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="sexo_masculino">Masculino</label>
                                </div>
                            </div>

                            @if ( $errors->has('sexo_acompanante') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('sexo_acompanante') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="edad" class="col-md-4 col-form-label">
                                {{ __("Edad") }}
                            </label>

                            <div class="col-md-8">
                                <input type="number"
                                    class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}"
                                    name="edad"
                                    id="edad"
                                    value="{{ old('edad') ?: $acompanante->edad }}"
                                    placeholder="{{ __("Ingrese edad") }}"
                                >
                                @if ( $errors->has('edad') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="parentesco_am" class="col-md-4 col-form-label">
                                {{ __("Parentesco con la persona mayor") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('parentesco_am') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="jefe" value="JEFE" {{ (old('parentesco_am') == 'JEFE' | $acompanante->parentesco_am == 'JEFE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="jefe">Jefe/a de familia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="conyuge" value="CONYUGE" {{ (old('parentesco_am') == 'CONYUGE' | $acompanante->parentesco_am == 'CONYUGE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="conyuge">Cónyuge o pareja</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="hijoambos" value="HIJOAMBOS" {{ (old('parentesco_am') == 'HIJOAMBOS' | $acompanante->parentesco_am == 'HIJOAMBOS') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="hijoambos">Hijo/a de ambos</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="hijo_jefe_familia" value="HIJOJEFE" {{ (old('parentesco_am') == 'HIJOJEFE' | $acompanante->parentesco_am == 'HIJOJEFE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="hijo_jefe_familia">Hijo/a sólo del/a Jefe/a de familia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="hijo_conyuge" value="HIJOCONYUGE" {{ (old('parentesco_am') == 'HIJOCONYUGE' | $acompanante->parentesco_am == 'HIJOCONYUGE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="hijo_conyuge">Hijo/a sólo del cónyuge o pareja</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="padre_madre" value="PADRE/MADRE" {{ (old('parentesco_am') == 'PADRE/MADRE' | $acompanante->parentesco_am == 'PADRE/MADRE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="padre_madre">Padre o Madre</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="suegro" value="SUEGRO" {{ (old('parentesco_am') == 'SUEGRO' | $acompanante->parentesco_am == 'SUEGRO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="suegro">Suegro</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="yerno_nuera" value="YERNO/NUERA" {{ (old('parentesco_am') == 'YERNO/NUERA' | $acompanante->parentesco_am == 'YERNO/NUERA') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="yerno_nuera">Yerno o Nuera</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="nieto" value="NIETO" {{ (old('parentesco_am') == 'NIETO' | $acompanante->parentesco_am == 'NIETO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="nieto">Nieto/a</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="bisnieto" value="BISNIETO/A" {{ (old('parentesco_am') == 'BISNIETO/A' | $acompanante->parentesco_am == 'BISNIETO/A') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="bisnieto">Bisnieto/a</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="hermano" value="HERMANO/A" {{ (old('parentesco_am') == 'HERMANO/A' | $acompanante->parentesco_am == 'HERMANO/A') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="hermano">Hermano/a</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="cunado" value="CUNADO/A" {{ (old('parentesco_am') == 'CUNADO/A' | $acompanante->parentesco_am == 'CUNADO/A') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="cunado">Cuñado/a</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="familiar" value="FAMILIAR" {{ (old('parentesco_am') == 'FAMILIAR' | $acompanante->parentesco_am == 'FAMILIAR') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="familiar">Otro Familiar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="parentesco_am" id="no_familiar" value="NOFAMILIAR" {{ (old('parentesco_am') == 'NOFAMILIAR' | $acompanante->parentesco_am == 'NOFAMILIAR') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="no_familiar">Otro no Familiar</label>
                                </div>
                            </div>

                            @if ( $errors->has('parentesco_am') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('parentesco_am') }}</strong>
                                </span>
                            @endif

                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="estado_trabajo" class="col-md-4 col-form-label">
                                {{ __("¿Se encuentra trabajando?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('estado_trabajo') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_trabajo" id="si_fuera" value="FUERA" {{ (old('estado_trabajo') == 'FUERA' | strcmp($acompanante->estado_trabajo, 'FUERA') === 0 ) ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="si_fuera">Si, fuera del hogar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_trabajo" id="si_dentro" value="DENTRO" {{ (old('estado_trabajo') == 'DENTRO' | strcmp($acompanante->estado_trabajo, 'DENTRO') === 0 ) ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="si_dentro">Si, dentro del hogar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_trabajo" id="no_trabaja" value="NO" {{ (old('estado_trabajo') == 'NO' | strcmp($acompanante->estado_trabajo, 'NO') === 0 ) ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="no_trabaja">No</label>
                                </div>
                            </div>

                            @if ( $errors->has('estado_trabajo') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('estado_trabajo') }}</strong>
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
                            

                            