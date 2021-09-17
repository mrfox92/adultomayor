@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('discapacidades.create', ['id' => $adultomayor->id]) }}" class="btn btn-primary"><i class="bx bx-save"></i> Registrar Discapacidad Adulto Mayor</a>
            </div>
        </div>
    </div>

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
            <li class="item"><a href="{{ route('adultosmayores.show', ['id' => $adultomayor->id] ) }}"> Fichas AM </a></li>

            <li class="item">{{ __("Discapacidad(es) ") }} {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</li>
        </ol>
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-md-12">
            <div class="my-2">
                <span class="">Leyenda tipo discapacidad: </span>
                <span class="badge badge-pill badge-primary">Visual</span>
                <span class="badge badge-pill badge-secondary">Auditiva</span>
                <span class="badge badge-pill badge-success">Lenguaje</span>
                <span class="badge badge-pill badge-danger">Motora</span>
                <span class="badge badge-pill badge-warning">Psíquica</span>
                <span class="badge badge-pill badge-info">Intelectual</span>
                <span class="badge badge-pill badge-light">Espectro autista</span>
                <span class="badge badge-pill badge-dark">Desarrollo</span>
                
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo Discapacidad</th>
                            <th>Nombre</th>
                            <th>Observación</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($discapacidades as $discapacidad)
                            <tr>
                                <td>{{ $discapacidad->id }}</td>
                                <td>
                                        @switch($discapacidad->tipoDiscapacidad->id)
                                        @case(1)
                                            <div>
                                                <span class="badge badge-pill badge-primary">{{ $discapacidad->tipoDiscapacidad->nombre }}</span>
                                            </div>
                                            @break
    
                                        @case(2)
                                            <span class="badge badge-pill badge-secondary">{{ $discapacidad->tipoDiscapacidad->nombre }}</span>
                                            @break
    
                                        @case(3)
                                            <span class="badge badge-pill badge-success">{{ $discapacidad->tipoDiscapacidad->nombre }}</span>
                                            @break
    
                                        @case(4)
                                            <span class="badge badge-pill badge-danger">{{ $discapacidad->tipoDiscapacidad->nombre }}</span>
                                            @break
    
                                        @case(5)
                                            <span class="badge badge-pill badge-warning">{{ $discapacidad->tipoDiscapacidad->nombre }}</span>
                                            @break
                                        @case(6)
                                            <span class="badge badge-pill badge-info">{{ $discapacidad->tipoDiscapacidad->nombre }}</span>
                                            @break
                                        @case(7)
                                            <span class="badge badge-pill badge-light">{{ $discapacidad->tipoDiscapacidad->nombre }}</span>
                                            @break
                                        @case(8)
                                            <span class="badge badge-pill badge-dark">{{ $discapacidad->tipoDiscapacidad->nombre }}</span>
                                            @break
    
                                        @endswitch
                                </td>
                                <td>{{ $discapacidad->nombre }}</td>
                                <td>{{ $discapacidad->observacion }}</td>
                                <td colspan="3">
    
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione acción
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('discapacidades.edit', $discapacidad->id) }}">Editar <i class="bx bx-edit"></i></a>
                                            <form class="my-2" method="POST" action="{{ route('discapacidades.destroy', $discapacidad->id) }}">
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
                                <p>No se han registrado discapacidades para este adulto mayor</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection