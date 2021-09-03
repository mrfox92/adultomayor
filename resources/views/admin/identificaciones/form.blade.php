
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>

            <li class="item"><a href="{{ route('adultosmayores.show', ['id' => $adultomayor->id] ) }}">Fichas A.M</a></li>
    
            <li class="item">{{ __("Agregar Ficha Identificación étnica") }}</li>
        </ol>
    </div>


    {{-- inicio formulario --}}

    <form
        method="POST"
        action="{{ route('identificacion.agregaretnia') }}"
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


                        <div class="form-group row my-5">
                            <label for="etnia_id" class="col-md-4 col-form-label">
                                {{ __("Etnia") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('etnia_id') ? ' is-invalid' : '' }}"
                                    name="etnia_id" id="etnia_id" required
                                >
                                    <option value="">Seleccione etnia</option>
                                    @foreach (\App\Etnia::pluck('nombre', 'id') as $id => $etnia)
                                        <option value="{{ $id }}">
                                            {{ $etnia }}
                                        </option>
                                        
                                    @endforeach
                
                                    
                                </select>

                                @if ( $errors->has('etnia_id') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('etnia_id') }}</strong>
                                    </span>
                                @endif
                            </div>
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

{{-- fin formulario --}}
</div>
@endsection
                            

                            