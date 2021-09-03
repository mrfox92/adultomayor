
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ $establecimiento->id ? route('psd.show', ['id' => $establecimiento->psd_id] ) : route('psd.show', ['id' => $psd->id] ) }}">Fichas PSD</a></li>
    
            <li class="item">{{ $establecimiento->id ? __("Editar Ficha Establecimiento Educacional") : __("Agregar Ficha Establecimiento Educacional") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $establecimiento->id ? route('establecimiento.store') : route('establecimiento.update', ['id' => $establecimiento->id]) }}"
    novalidate
    >
    
    @if ( $establecimiento->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $establecimiento->id )
                            {{ $establecimiento->psd->nombre }}
                        @else
                            {{ $psd->nombre }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $establecimiento->id ? __("Editar Ficha Establecimiento Educacional") : __("Agregar Ficha Establecimiento Educacional") }}
                        </h5>

                        @if ( !$establecimiento->id )

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
                        
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">
                                {{ __("Nombre") }}
                            </label>
                            <div class="col-md-8">

                                <input type="text"
                                    class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                    name="nombre"
                                    id="nombre"
                                    value="{{ old('nombre') ?: $establecimiento->nombre }}"
                                    required
                                    placeholder="{{ __("Ingrese nombre establecimiento") }}"
                                >

                                @if ( $errors->has('nombre') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label">
                                {{ __("Dirección") }}
                            </label>
                            <div class="col-md-8">

                                <input type="text"
                                    class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                    name="direccion"
                                    id="direccion"
                                    value="{{ old('direccion') ?: $establecimiento->direccion }}"
                                    required
                                    placeholder="{{ __("Ingrese direccion establecimiento") }}"
                                >

                                @if ( $errors->has('direccion') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">
                                {{ __("Correo electrónico") }}
                            </label>
                            <div class="col-md-8">

                                <input type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') ?: $establecimiento->email }}"
                                    required
                                    placeholder="{{ __("Ingrese correo electrónico") }}"
                                >

                                @if ( $errors->has('email') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label">
                                {{ __("N° Telefono (opcional)") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                    name="telefono"
                                    id="telefono"
                                    value="{{ old('telefono') ?: $establecimiento->telefono }}"
                                    placeholder="{{ __("Ingrese n° telefono") }}"
                                >
                                @if ( $errors->has('telefono') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="encargado" class="col-md-4 col-form-label">
                                {{ __("Nombre encargado") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('encargado') ? ' is-invalid' : '' }}"
                                    name="encargado"
                                    id="encargado"
                                    value="{{ old('encargado') ?: $establecimiento->encargado }}"
                                    placeholder="{{ __("Ingrese nombre encargado") }}"
                                >
                                @if ( $errors->has('encargado') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('encargado') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="curso_actual" class="col-md-4 col-form-label">
                                {{ __("Curso actual") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('curso_actual') ? ' is-invalid' : '' }}"
                                    name="curso_actual"
                                    id="curso_actual"
                                    value="{{ old('curso_actual') ?: $establecimiento->curso_actual }}"
                                    placeholder="{{ __("Ingrese curso actual") }}"
                                >
                                @if ( $errors->has('curso_actual') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('curso_actual') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="profesor" class="col-md-4 col-form-label">
                                {{ __("Nombre profesor") }}
                            </label>

                            <div class="col-md-8">
                                <input type="text"
                                    class="form-control{{ $errors->has('profesor') ? ' is-invalid' : '' }}"
                                    name="profesor"
                                    id="profesor"
                                    value="{{ old('profesor') ?: $establecimiento->profesor }}"
                                    placeholder="{{ __("Ingrese nombre profesor") }}"
                                >
                                @if ( $errors->has('profesor') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('profesor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="programa_pie" class="col-md-4 col-form-label">
                                {{ __("¿Está inscrito en programa PIE?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('programa_pie') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="programa_pie" id="programa_pie_no" value="NO" {{ (old('programa_pie') == 'NO' | $establecimiento->programa_pie == 'NO') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="programa_pie_no">NO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="programa_pie" id="programa_pie_si" value="SI" {{ (old('programa_pie') == 'SI' | $establecimiento->programa_pie == 'SI') ? 'checked' : ''}}>
                                    <label class="form-check-label col-form-label" for="programa_pie_si">SI</label>
                                </div>
                            </div>

                            @if ( $errors->has('programa_pie') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('programa_pie') }}</strong>
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
                            

                            