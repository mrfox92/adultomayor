
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('beneficiopsd.show', ['id' => $psd->id]) }}">Beneficios Estatales PSD</a></li>
    
            <li class="item">{{ __("Inscribir Beneficio estatal PSD") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ route('beneficiopsd.store') }}"
    novalidate
    >
    
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        {{ $psd->nombres }} {{ $psd->apellidos }}

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ __("Inscribir Beneficio estatal PSD") }}
                        </h5>

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


                        <div class="form-group row">
                            <label for="beneficio_estatal_id" class="col-md-4 col-form-label">
                                {{ __("Beneficio Estatal") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('beneficio_estatal_id') ? ' is-invalid' : '' }}"
                                    name="beneficio_estatal_id" id="beneficio_estatal_id"
                                >
                                    <option value="">Seleccione Beneficio Estatal</option>
                                    @foreach (\App\BeneficioEstatal::pluck('nombre', 'id') as $id => $beneficio)
                                        <option {{ (int) old('beneficio_estatal_id') === $id || $beneficiopsd->beneficio_estatal_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $beneficio }}
                                        </option>
                                    @endforeach
                                    
                                </select>
                                @if ( $errors->has('beneficio_estatal_id') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('beneficio_estatal_id') }}</strong>
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
                            

                            