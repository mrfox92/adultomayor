
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('trabajosbanoam.show', ['id' => $adultomayor->id]) }}">Trabajo(s) Baño A.M</a></li>
    
            <li class="item">{{ __("Inscribir Trabajo Baño A.M") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ route('trabajosbanoam.store') }}"
    novalidate
    >
    
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ __("Inscribir Trabajo Baño AM") }}
                        </h5>

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


                        <div class="form-group row">
                            <label for="trabajo_bano_id" class="col-md-4 col-form-label">
                                {{ __("Trabajo Baño") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('trabajo_bano_id') ? ' is-invalid' : '' }}"
                                    name="trabajo_bano_id" id="trabajo_bano_id"
                                >
                                    <option value="">Seleccione Actividad</option>
                                    @foreach (\App\TrabajoBano::pluck('nombre', 'id') as $id => $trabajo_bano)
                                        <option {{ (int) old('trabajo_bano_id') === $id || $am_trabajo_bano->trabajo_bano_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $trabajo_bano }}
                                        </option>
                                    @endforeach
                                    
                                </select>
                                @if ( $errors->has('trabajo_bano_id') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('trabajo_bano_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="obs_trabajo_bano" class="col-md-4 col-form-label">
                                {{ __("Observación (Opcional)") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('obs_trabajo_bano') ? ' is-invalid' : '' }}"
                                    name="obs_trabajo_bano"
                                    id="obs_trabajo_bano"
                                    value="{{ old('obs_trabajo_bano') ?: $am_trabajo_bano->obs_trabajo_bano }}"
                                    placeholder="{{ __("Ingrese una observación...") }}"
                                >
                                @if ( $errors->has('obs_trabajo_bano') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('obs_trabajo_bano') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        
                        <hr>

                        <div class="form-group row">
                            <label for="fecha_trabajo_bano" class="col-md-4 col-form-label">
                                {{ __("Fecha Trabajo Baño (Opcional)") }}
                            </label>

                            <div class="col-md-8">
                                <input type="date"
                                    class="form-control{{ $errors->has('fecha_trabajo_bano') ? ' is-invalid' : '' }}"
                                    name="fecha_trabajo_bano"
                                    id="fecha_trabajo_bano"
                                    value="{{ old('fecha_trabajo_bano') ?: $am_trabajo_bano->fecha_trabajo_bano }}"
                                >

                                @if ( $errors->has('fecha_trabajo_bano') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fecha_trabajo_bano') }}</strong>
                                    </span>
                                @endif
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
                            

                            