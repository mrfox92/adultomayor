@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('etnia.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar etnia</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Etnia</th>
                        <th>Descripción</th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($etnias as $etnia)
                        <tr>
                            <td>{{ $etnia->id }}</td>
                            <td>{{ $etnia->nombre }}</td>
                            <td>{{ $etnia->descripcion }}</td>
                            <td colspan="3">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('etnia.edit', $etnia->id) }}">Editar <i class="bx bx-edit"></i></a>
                                        <form class="my-2" method="POST" action="{{ route('etnia.destroy', $etnia->id) }}">
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
                        <h6 class="text center alert alert-info">No se ha agregado ninguna etnia</h6>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    {{ $etnias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection