@extends('layouts.app')

@section('content')
    <div class="container-fluid my-5">
        
        
        <div class="jumbotron my-5">
            <h3 class="text-center text-uppercase">
                Detalle PSD: {{ $psd->nombres }} {{ ( $psd->apellidos ) ? $psd->apellidos : '' }}
            </h3>
        </div>
        
        <div class="breadcrumb-area">
            <h1>Inicio</h1>
        
            <ol class="breadcrumb">
                <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
        
                <li class="item"><a href="{{ route('psd.index') }}">PSD</a></li>
        
                <li class="item">{{ __("Detalle PSD") }}</li>
            </ol>
        </div>
        
        <div class="card-columns">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Reporte Información PSD</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Este informe genera un reporte en PDF de la información de registro de la PSD</p>

                    <a class="btn btn-danger btn-block text-uppercase" href="{{ route('psdreporte.show', ['id' => $psd->id]) }}" target="_blank">Descargar PDF</a>
                    <button type="button" class="btn btn-primary btn-block text-uppercase" data-toggle="modal" data-target="#modal-{{$psd->id}}">
                        Ver Detalle <i class="bx bx-show-alt"></i>
                    </button>
                    <!-- Modal include -->
                    @include('partials.admin.modal_psd.modal', ['item' => $psd])
                    <!-- Modal include -->
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Datos Establecimiento educacional - Estudiante</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">En caso de que sea estudiante llenar esta ficha</p>

                    @if ( $establecimiento )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('establecimiento.edit', ['id' => $psd->id]) }}">Editar Ficha</a>
                        <a class="btn btn-danger btn-block text-uppercase" href="{{ route('establecimiento.show', ['id' => $psd->id]) }}" target="_blank">Descargar PDF</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('establecimiento.create', ['id' => $psd->id]) }}">Registrar</a>
                    @endif
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Datos Trabajador Dependiente</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">En caso de que sea trabajador llenar esta ficha</p>

                    @if ( $trabajador )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('trabajador.edit', ['id' => $psd->id]) }}">Editar Ficha</a>
                        <a class="btn btn-danger btn-block text-uppercase" href="{{ route('trabajador.show', ['id' => $psd->id]) }}" target="_blank">Descargar PDF</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('trabajador.create', ['id' => $psd->id]) }}">Registrar</a>
                    @endif
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Datos Trabajador Independiente</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">
                        Un trabajador independiente no está vinculado a una empresa mediante un contrato de trabajo y realiza prestación de servicio</p>

                    @if ( $independiente )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('independientes.edit', ['id' => $psd->id]) }}">Editar Ficha</a>
                        <a class="btn btn-danger btn-block text-uppercase" href="{{ route('independientes.show', ['id' => $psd->id]) }}" target="_blank">Descargar PDF</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('independientes.create', ['id' => $psd->id]) }}">Registrar</a>
                    @endif
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Datos - Otra actividad</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">En caso de que sea realice algúna actividad completamente diferente a todas las anteriores, llenar esta ficha</p>

                    @if ( $otras )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('otras.edit', ['id' => $psd->id]) }}">Editar Ficha</a>
                        <a class="btn btn-danger btn-block text-uppercase" href="{{ route('otras.show', ['id' => $psd->id]) }}" target="_blank">Descargar PDF</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('otras.create', ['id' => $psd->id]) }}">Registrar</a>
                    @endif
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Beneficios estatales</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha registrar los beneficios estatales que recibe la PSD</p>

                    @if ( $beneficio )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('beneficiopsd.show', ['id' => $psd->id]) }}">Administrar</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('beneficiopsd.create', ['id' => $psd->id]) }}">Registrar</a>
                    @endif
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Discapacidad(es) PSD</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha para registrar la(s) discapacidad(es) de la PSD y adjuntar archivo(s) que acrediten dicha(s) discapacidad(es)</p>

                    @if ( $discapacidad )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('discapacidadpsd.show', ['id' => $psd->id]) }}">Administrar</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('discapacidadpsd.show', ['id' => $psd->id]) }}">Registrar</a>
                    @endif
                    
                </div>
            </div>
            
        </div>
    <div>
@endsection