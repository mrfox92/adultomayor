
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('vivienda.index') }}">Fichas VIviendas A.M</a></li>
    
            <li class="item">{{ $vivienda->id ? __("Editar Ficha Vivienda AM") : __("Agregar Ficha Vivienda AM") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $vivienda->id ? route('vivienda.store') : route('vivienda.update', ['id' => $vivienda->id]) }}"
    novalidate
    >
    
    @if ( $vivienda->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $vivienda->id )
                            {{ $vivienda->adultomayor->nombres }} {{ $vivienda->adultomayor->apellidos }}
                        @else
                            {{ $vivienda->nombres }} {{ $vivienda->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $vivienda->id ? __("Editar Ficha Vivienda AM") : __("Agregar Ficha Vivienda AM") }}
                        </h5>

                        @if ( !$vivienda->id )

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


                        <div class="form-group row my-5">
                            <label for="id_tipo_vivienda" class="col-md-4 col-form-label">
                                {{ __("Tipo Vivienda") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('id_tipo_vivienda') ? ' is-invalid' : '' }}"
                                    name="id_tipo_vivienda" id="id_tipo_vivienda"
                                >
                                    <option value="">Seleccione tipo vivienda</option>
                                    @foreach (\App\TipoVivienda::pluck('nombre', 'id') as $id => $tipo_vivienda)
                                        <option {{ (int) old('id_tipo_vivienda') === $id || $vivienda->id_tipo_vivienda === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $tipo_vivienda }}
                                        </option>
                                        
                                    @endforeach

                                    
                                </select>
                                @if ( $errors->has('id_tipo_vivienda') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('id_tipo_vivienda') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="ocupacion_vivienda" class="col-md-4 col-form-label">
                                {{ __("¿Bajo qué situación ocupa su vivienda?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('ocupacion_vivienda') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ocupacion_vivienda" id="ocupacion_vivienda_pagada" value="PAGADA" {{ (old('ocupacion_vivienda') == 'PAGADA' | $vivienda->ocupacion_vivienda == 'PAGADA') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="ocupacion_vivienda_pagada">Propia Pagada</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ocupacion_vivienda" id="ocupacion_vivienda_pagandose" value="PAGANDOSE" {{ (old('ocupacion_vivienda') == 'PAGANDOSE' | $vivienda->ocupacion_vivienda == 'PAGANDOSE') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="ocupacion_vivienda_pagandose">Propia Pagandose</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ocupacion_vivienda" id="ocupacion_vivienda_arrendada" value="ARRENDADA" {{ (old('ocupacion_vivienda') == 'ARRENDADA' | $vivienda->ocupacion_vivienda == 'ARRENDADA') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="ocupacion_vivienda_arrendada">Arrendada</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ocupacion_vivienda" id="ocupacion_vivienda_cedida" value="CEDIDA" {{ (old('ocupacion_vivienda') == 'CEDIDA' | $vivienda->ocupacion_vivienda == 'CEDIDA') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="ocupacion_vivienda_cedida">Cedida / Uso gratuito</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ocupacion_vivienda" id="ocupacion_vivienda_usufructo" value="USUFRUCTO" {{ (old('ocupacion_vivienda') == 'USUFRUCTO' | $vivienda->ocupacion_vivienda == 'USUFRUCTO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="ocupacion_vivienda_usufructo">Usufructo (sólo uso y goce)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ocupacion_vivienda" id="ocupacion_vivienda_irregular" value="IRREGULAR" {{ (old('ocupacion_vivienda') == 'IRREGULAR' | $vivienda->ocupacion_vivienda == 'IRREGULAR') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="ocupacion_vivienda_irregular">Ocupación irregular</label>
                                </div>
                            </div>

                            @if ( $errors->has('ocupacion_vivienda') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('ocupacion_vivienda') }}</strong>
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
                            

                            