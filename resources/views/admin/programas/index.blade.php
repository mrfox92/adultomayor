@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('programas.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar Programa</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Programa</th>
                        <th>Descripción</th>
                        <th>Objetivo(s)</th>
                        <th>Requisito(s)</th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($programas as $programa)
                        <tr>
                            <td>{{ $programa->id }}</td>
                            <td>{{ $programa->nombre }}</td>
                            <td>{{ $programa->descripcion }}</td>
                            <td>{{ $programa->objetivo }}</td>
                            <td>{{ $programa->requisitos }}</td>
                            <td colspan="3">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('programas.edit', $programa->id) }}">Editar <i class="bx bx-edit"></i></a>
                                        <form class="my-2" method="POST" action="{{ route('programas.destroy', $programa->id) }}">
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
                    {{ $programas->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection