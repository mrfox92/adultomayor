@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('institucionsalud.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar Institución Salud</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Localidad</th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($instituciones_salud as $institucion_salud)
                        <tr>
                            <td>{{ $institucion_salud->id }}</td>
                            <td>{{ $institucion_salud->nombre }}</td>
                            <td>{{ $institucion_salud->direccion }}</td>
                            <td>{{ $institucion_salud->localidad }}</td>
                            <td colspan="3">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('institucionsalud.edit', $institucion_salud->id) }}">Editar <i class="bx bx-edit"></i></a>
                                        <form class="my-2" method="POST" action="{{ route('institucionsalud.destroy', $institucion_salud->id) }}">
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
                        
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    {{ $instituciones_salud->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection