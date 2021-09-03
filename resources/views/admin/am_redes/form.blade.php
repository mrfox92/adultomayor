
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('amred.show', ['id' => $adultomayor->id]) }}">Redes A.M</a></li>
    
            <li class="item">{{ __("Inscribir Red A.M") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ route('amred.store') }}"
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
                            {{ __("Inscribir Red AM") }}
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
                            <label for="red_id" class="col-md-4 col-form-label">
                                {{ __("Red") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    class="form-control{{ $errors->has('red_id') ? ' is-invalid' : '' }}"
                                    name="red_id" id="red_id"
                                >
                                    <option value="">Seleccione Red</option>
                                    @foreach (\App\Red::pluck('nombre', 'id') as $id => $red)
                                        <option {{ (int) old('red_id') === $id || $amRed->red_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $red }}
                                        </option>
                                    @endforeach
                                    
                                </select>
                                @if ( $errors->has('red_id') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('red_id') }}</strong>
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
                            

                            