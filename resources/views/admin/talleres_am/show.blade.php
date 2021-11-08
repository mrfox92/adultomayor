@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('talleram.create', ['id' => $adultomayor->id]) }}" class="btn btn-primary text-uppercase"><i class="bx bx-save"></i> Inscribir Taller</a>
            </div>
        </div>
    </div>

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
            <li class="item"><a href="{{ route('adultosmayores.show', ['id' => $adultomayor->id] ) }}"> Fichas AM </a></li>

            <li class="item">{{ __("Taller(es) ") }} {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-stripped my-5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo Taller</th>
                            <th>Taller</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Término</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($talleres as $taller)
                            <tr>
                                <td>{{ $taller->id }}</td>
                                <td>
                                    {{ $taller->taller()->first()->tipotaller()->first()->nombre }}
                                </td>
                                <td>{{ $taller->taller()->first()->nombre }}</td>
                                <td>
                                    @if ( isset($taller->taller()->first()->fecha_inicio) && !empty(isset($taller->taller()->first()->fecha_inicio)) )
                                        {{ \Carbon\Carbon::parse( $taller->taller()->first()->fecha_inicio )->format('d/m/Y') }}
                                    @else
                                        <span class="badge badge-secondary">No especificada </span>
                                    @endif
                                </td>
                                <td>
                                    @if ( isset($taller->taller()->first()->fecha_fin) && !empty(isset($taller->taller()->first()->fecha_fin)) )
                                        {{ \Carbon\Carbon::parse( $taller->taller()->first()->fecha_fin )->format('d/m/Y') }}
                                    @else
                                        <span class="badge badge-secondary">No especificada </span>
                                    @endif
                                </td>
    
                                <td colspan="3">
    
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione acción
                                        </button>
                                        <div class="dropdown-menu">
                                            <form class="my-2" method="POST" action="{{ route('talleram.destroy', $taller->id) }}">
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
                                <p>No se han inscrito talleres para este adulto mayor</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection