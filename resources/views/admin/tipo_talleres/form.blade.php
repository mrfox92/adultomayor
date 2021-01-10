@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('tipotalleres.index') }}">Tipo Talleres</a></li>
    
            <li class="item">{{ $tipotaller->id ? __("Editar Tipo Taller") : __("Agregar Tipo Taller") }}</li>
        </ol>
    </div>

    <div class="pl-5 pr-5">
        <form
            method="POST"
            action="{{ ! $tipotaller->id ? route('tipotalleres.store') : route('tipotalleres.update', ['id' => $tipotaller->id]) }}"
            novalidate
        >

            @if ( $tipotaller->id )
                @method('PUT')
            @endif
            {{-- proteccion csrf --}}
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-uppercase">
                            {{ $tipotaller->id ? __("Editar Tipo Taller") : __("Agregar Tipo Taller") }}
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
                                        value="{{ old('nombre') ?: $tipotaller->nombre }}"
                                        required
                                        autofocus
                                        placeholder="{{ __("Ingrese un nombre para tipo taller") }}"
                                    >

                                    @if ( $errors->has('nombre') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label">
                                    {{ __("Descripción") }}
                                </label>

                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                        name="descripcion"
                                        id="descripcion"
                                        value="{{ old('descripcion') ?: $tipotaller->descripcion }}"
                                        placeholder="{{ __("Ingrese una descripción") }}"
                                    >
                                    @if ( $errors->has('descripcion') )
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
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