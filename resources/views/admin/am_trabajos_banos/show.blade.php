@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('trabajosbanoam.create', ['id' => $adultomayor->id]) }}" class="btn btn-primary text-uppercase"><i class="bx bx-save"></i> Inscribir Trabajo Baño</a>
            </div>
        </div>
    </div>

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
            <li class="item"><a href="{{ route('adultosmayores.show', ['id' => $adultomayor->id] ) }}"> Fichas AM </a></li>

            <li class="item">{{ __("Atencion(es) Trabajo(s) Baño ") }} {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</li>
        </ol>
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-striped my-5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Atención Trabajo Baño</th>
                            <th>Observación</th>
                            <th>Fecha Trabajo Baño</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trabajos_banos as $trabajo_bano)
                            <tr>
                                <td>{{ $trabajo_bano->id }}</td>
                                <td>
                                    {{ $trabajo_bano->trabajoBano()->first()->nombre }}
                                </td>
                                <td>{{ $trabajo_bano->obs_trabajo_bano }}</td>
                                <td>{{ \Carbon\Carbon::parse( $trabajo_bano->fecha_trabajo_bano )->format('d/m/Y') }}</td>
    
                                <td colspan="3">
    
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione acción
                                        </button>
                                        <div class="dropdown-menu">
                                            <form class="my-2" method="POST" action="{{ route('trabajosbanoam.destroy', $trabajo_bano->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">
                                                    Eliminar <i class="bx bxs-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-info text-center text-uppercase">
                                <p>No se han inscrito Trabajo(s) Baño(s) para este adulto mayor</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection