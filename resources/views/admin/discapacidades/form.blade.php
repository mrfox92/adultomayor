
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>

            <li class="item"><a href="{{ route('discapacidades.show', ['id' => $adultomayor->id]) }}">Ficha Discapacidad(es) A.M</a></li>
    
            <li class="item">{{ $discapacidad->id ? __("Editar Ficha Discapacidad AM") : __("Agregar Ficha Discapacidad AM") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $discapacidad->id ? route('discapacidades.store') : route('discapacidades.update', ['id' => $discapacidad->id]) }}"
    novalidate
    >
    
    @if ( $discapacidad->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $discapacidad->id )
                            {{ $discapacidad->adultomayor->nombres }} {{ $discapacidad->adultomayor->apellidos }}
                        @else
                            {{ $discapacidad->nombres }} {{ $discapacidad->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $discapacidad->id ? __("Editar Ficha Discapacidad AM") : __("Agregar Ficha Discapacidad AM") }}
                        </h5>

                        @if ( !$discapacidad->id )

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
                            <label for="id_tipo_discapacidad" class="col-md-4 col-form-label">
                                {{ __("Tipo Discapacidad") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('id_tipo_discapacidad') ? ' is-invalid' : '' }}"
                                    name="id_tipo_discapacidad" id="id_tipo_discapacidad"
                                >
                                    <option value="">Seleccione tipo discapacidad</option>
                                    @foreach (\App\TipoDiscapacidad::pluck('nombre', 'id') as $id => $tipo_discapacidad)
                                        <option {{ (int) old('id_tipo_discapacidad') === $id || $discapacidad->id_tipo_discapacidad === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $tipo_discapacidad }}
                                        </option>
                                        
                                    @endforeach

                                    
                                </select>
                                @if ( $errors->has('id_tipo_discapacidad') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('id_tipo_discapacidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">
                                {{ __("Nombre Discapacidad") }}
                            </label>
                            <div class="col-md-8">

                                <input type="text"
                                    class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                    name="nombre"
                                    id="nombre"
                                    value="{{ old('nombre') ?: $discapacidad->nombre }}"
                                    required
                                    placeholder="{{ __("Ingrese nombre discapacidad") }}"
                                >

                                @if ( $errors->has('nombre') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="observacion" class="col-md-4 col-form-label">
                                {{ __("Observación/descripción discapacidad (opcional)") }}
                            </label>
                            <div class="col-md-8">

                                <textarea 
                                    class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}"
                                    name="observacion" id="observacion" cols="2" rows="3"
                                    placeholder="{{ __("Ingrese observación discapacidad...") }}"
                                > {{ old('observacion') ?: $discapacidad->observacion }} </textarea>

                                @if ( $errors->has('observacion') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('observacion') }}</strong>
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
                            

                            