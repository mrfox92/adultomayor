
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('autonomia.index') }}">Fichas Identificación étnica</a></li>
    
            <li class="item">{{ __("Agregar Ficha Identificación étnica") }}</li>
        </ol>
    </div>


    <form
    method="POST"
    action="{{ route('identificacion.store') }}"
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
                            {{ __("Ficha Identificación étnica") }}
                        </h5>

                        <div class="form-group row">
                            <label for="colaborar_tareas_hogar" class="col-md-4 col-form-label">
                                {{ __("¿A cuál de los siguientes pueblos indígenas usted pertenece?") }}
                            </label>

                            <div class="col-md-8{{ $errors->has('etnias') ? ' is-invalid' : '' }}">

                                @foreach ($etnias as $etnia)
                                    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{ $etnia->nombre }}" name="etnias[]" value="{{ $etnia->id }}">
                                        <label class="form-check-label" for="{{ $etnia->nombre }}">{{ $etnia->nombre }}</label>
                                    </div>

                                @endforeach


                            </div>

                            @if ( $errors->has('etnias') )
                                <span class="invalid-feedback text-center">
                                    <strong>{{ $errors->first('etnias') }}</strong>
                                </span>
                            @endif

                        </div>

                        <input type="hidden" name="adulto_mayor_id" value="{{ $adultomayor->id }}">
                

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    {{ __("Guardar") }} <i class="bx bx-save"></i>
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
                            

                            