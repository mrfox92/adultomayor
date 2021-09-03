
@extends('layouts.app')

@section('content')
@inject('tipoTalleres', 'App\Services\TipoTalleres');
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('talleram.show', ['id' => $adultomayor->id]) }}">Fichas A.M</a></li>
    
            <li class="item">{{ $amTaller->id ? __("Editar Inscripción taller AM") : __("Inscripción taller AM") }}</li>
        </ol>
    </div>




    <form
    method="POST"
    action="{{ ! $amTaller->id ? route('talleram.store') : route('talleram.update', ['id' => $amTaller->id]) }}"
    novalidate
    >
    
    @if ( $amTaller->id )
        @method('PUT')
    @endif
    {{-- proteccion csrf --}}
    @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">

                        @if ( $amTaller->id )
                            {{ $amTaller->adultomayor->nombres }} {{ $amTaller->adultomayor->apellidos }}
                        @else
                            {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}
                        @endif

                    </div>

                    <hr> 

                    <div class="card-body">

                        <h5 class="card-title text-center text-uppercase mt-3 mb-5">
                            {{ $amTaller->id ? __("Editar Taller Inscrito AM") : __("Inscribir Taller A.M") }}
                        </h5>

                        @if ( !$amTaller->id )

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
                            <label for="tipo_taller_id" class="col-md-4 col-form-label">
                                {{ __("Tipo Taller") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    v-model="selected_tipo_taller" @change="getTalleres"
                                    data-old="{{ old('tipo_taller_id') }}"
                                    class="form-control{{ $errors->has('tipo_taller_id') ? ' is-invalid' : '' }}"
                                    name="tipo_taller_id" id="tipo_taller_id"
                                >
                                    @foreach ( $tipoTalleres->get() as $index => $tipo )
                                        <option value="{{ $index }}">
                                            {{ $tipo }}
                                        </option>
                                        
                                    @endforeach
                                    
                                </select>
                                @if ( $errors->has('tipo_taller_id') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tipo_taller_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row my-5">
                            <label for="taller_id" class="col-md-4 col-form-label">
                                {{ __("Taller") }}
                            </label>
                            <div class="col-md-8">
                                <select
                                    v-model="selected_taller"
                                    data-old="{{ old('taller_id') }}"
                                    class="form-control{{ $errors->has('taller_id') ? ' is-invalid' : '' }}"
                                    name="taller_id" id="taller_id"
                                >
                                <option value="">Seleccione un taller</option>
                                <option v-for="(taller, index) in talleres" v-bind:value="index">
                                    @{{ taller }}
                                </option>
                                    
                                </select>
                                @if ( $errors->has('taller_id') )
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('taller_id') }}</strong>
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
                            

                            