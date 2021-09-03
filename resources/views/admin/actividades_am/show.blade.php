@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('actividadam.create', ['id' => $adultomayor->id]) }}" class="btn btn-primary text-uppercase"><i class="bx bx-save"></i> Inscribir Actividad</a>
            </div>
        </div>
    </div>

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
            <li class="item"><a href="{{ route('adultosmayores.show', ['id' => $adultomayor->id] ) }}"> Fichas AM </a></li>

            <li class="item">{{ __("Actividad(es) ") }} {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-stripped my-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Actividad</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Término</th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($actividades as $actividad)
                        <tr>
                            <td>{{ $actividad->id }}</td>
                            <td>
                                {{ $actividad->actividad()->first()->nombre }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse( $actividad->actividad()->first()->fecha_inicio )->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse( $actividad->actividad()->first()->fecha_fin )->format('d/m/Y') }}</td>

                            <td colspan="3">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <form class="my-2" method="POST" action="{{ route('actividadam.destroy', $actividad->id) }}">
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
                            <p>No se han inscrito actividad(es) para este adulto mayor</p>
                        </div>
                    @endforelse
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection