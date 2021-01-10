@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h3 class="text-center">Lorem ipsum dolor sit amet</h3>
            </div>
        </div>
    </div> --}}

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('alfabetizacion.index') }}">Alfabetización</a></li>
    
            <li class="item">{{ $alfabetizacion->id ? __("Editar nivel alfabetizacion") : __("agregar nivel alfabetizacion") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $alfabetizacion->id ? route('alfabetizacion.store') : route('alfabetizacion.update', ['id' => $alfabetizacion->id]) }}"
            novalidate
        >

            @if ( $alfabetizacion->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $alfabetizacion->id ? __("Editar nivel alfabetizacion") : __("agregar nivel alfabetizacion") }}
                        </div>
                        <hr>    
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label">
                                    {{ __("Nombre") }}
                                </label>
                                <div class="col-md-8">

                                    <input type="text"
                                        class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                        name="nombre"
                                        id="nombre"
                                        value="{{ old('nombre') ?: $alfabetizacion->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese un nombre nivel") }}"
                                    >

                                    @if ( $errors->has('nombre') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif

                                </div>
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