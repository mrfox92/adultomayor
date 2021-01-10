@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('redes.index') }}">Redes</a></li>
    
            <li class="item">{{ $red->id ? __("Editar Red") : __("Agregar Red") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $red->id ? route('redes.store') : route('redes.update', ['id' => $red->id]) }}"
            novalidate
        >

            @if ( $red->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $red->id ? __("Editar Red") : __("Agregar Red") }}
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
                                        value="{{ old('nombre') ?: $red->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese un nombre para red") }}"
                                    >

                                    @if ( $errors->has('nombre') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="num_contacto" class="col-md-4 col-form-label">
                                    {{ __("N° Contacto") }}
                                </label>
                                <div class="col-md-8">
                                    <input type="tel"
                                        class="form-control{{ $errors->has('num_contacto') ? ' is-invalid' : '' }}"
                                        name="num_contacto"
                                        id="num_contacto"
                                        value="{{ old('num_contacto') ?: $red->num_contacto }}"
                                        placeholder="{{ __("Ingrese N° de contacto") }}"
                                    >
                                    @if ( $errors->has('num_contacto') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('num_contacto') }}</strong>
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