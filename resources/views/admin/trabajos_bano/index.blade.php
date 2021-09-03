@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('trabajosbano.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar Trabajo Baño</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-12">
            <table class="table table-hover table-stripped my-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Trabajo Baño</th>
                        <th>Descripción</th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trabajos_bano as $trabajo)
                        <tr>
                            <td>{{ $trabajo->id }}</td>
                            <td>{{ $trabajo->nombre }}</td>
                            <td>{{ $trabajo->descripcion }}</td>
                            <td colspan="3">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Ver <i class="bx bx-show-alt"></i></a>
                                        <a class="dropdown-item" href="{{ route('trabajosbano.edit', $trabajo->id) }}">Editar <i class="bx bx-edit"></i></a>
                                        <form class="my-2" method="POST" action="{{ route('trabajosbano.destroy', $trabajo->id) }}">
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
                    {{ $trabajos_bano->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection