
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('amprograma.show', ['id' => $adultomayor->id]) }}">Programas A.M</a></li>
    
            <li class="item">{{ __("Inscribir Programa A.M") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ route('amprograma.store') }}"
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
                            {{ __("Inscribir Programa AM") }}
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
                            <label for="programa_id" class="col-md-4 col-form-label">
                                {{ __("Programa") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('programa_id') ? ' is-invalid' : '' }}"
                                    name="programa_id" id="programa_id"
                                >
                                    <option value="">Seleccione Programa</option>
                                    @foreach (\App\Programa::pluck('nombre', 'id') as $id => $programa)
                                        <option {{ (int) old('programa_id') === $id || $amPrograma->programa_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $programa }}
                                        </option>
                                    @endforeach
                                    
                                </select>
                                @if ( $errors->has('programa_id') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('programa_id') }}</strong>
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
                            

                            