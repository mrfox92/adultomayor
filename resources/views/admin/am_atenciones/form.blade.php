
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('atencionesam.show', ['id' => $adultomayor->id]) }}">Atenciones A.M</a></li>
    
            <li class="item">{{ __("Inscribir Atención A.M") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ route('atencionesam.store') }}"
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
                            {{ __("Inscribir Atención AM") }}
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
                            <label for="atencion_id" class="col-md-4 col-form-label">
                                {{ __("Atención") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('atencion_id') ? ' is-invalid' : '' }}"
                                    name="atencion_id" id="atencion_id"
                                >
                                    <option value="">Seleccione Atención</option>
                                    @foreach (\App\Atencion::pluck('nombre', 'id') as $id => $atencion)
                                        <option {{ (int) old('atencion_id') === $id || $am_atencion->atencion_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $atencion }}
                                        </option>
                                    @endforeach
                                    
                                </select>
                                @if ( $errors->has('atencion_id') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('atencion_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="obs_atencion" class="col-md-4 col-form-label">
                                {{ __("Observación (Opcional)") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('obs_atencion') ? ' is-invalid' : '' }}"
                                    name="obs_atencion"
                                    id="obs_atencion"
                                    value="{{ old('obs_atencion') ?: $am_atencion->obs_atencion }}"
                                    placeholder="{{ __("Ingrese una observación...") }}"
                                >
                                @if ( $errors->has('obs_atencion') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('obs_atencion') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        
                        <hr>

                        <div class="form-group row">
                            <label for="fecha_atencion" class="col-md-4 col-form-label">
                                {{ __("Fecha Atención (Opcional)") }}
                            </label>

                            <div class="col-md-8">
                                <input type="date"
                                    class="form-control{{ $errors->has('fecha_atencion') ? ' is-invalid' : '' }}"
                                    name="fecha_atencion"
                                    id="fecha_atencion"
                                    value="{{ old('fecha_atencion') ?: $am_atencion->fecha_atencion }}"
                                >

                                @if ( $errors->has('fecha_atencion') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fecha_atencion') }}</strong>
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
                            

                            