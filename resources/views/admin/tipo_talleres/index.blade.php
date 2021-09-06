@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('tipotalleres.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar Tipo Taller</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-12">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo Taller</th>
                        <th>Descripción</th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tipo_talleres as $tipotaller)
                        <tr>
                            <td>{{ $tipotaller->id }}</td>
                            <td>{{ $tipotaller->nombre }}</td>
                            <td>{{ $tipotaller->descripcion }}</td>
                            <td colspan="3">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('tipotalleres.edit', $tipotaller->id) }}">Editar <i class="bx bx-edit"></i></a>
                                        <form class="my-2" method="POST" action="{{ route('tipotalleres.destroy', $tipotaller->id) }}">
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
                    {{ $tipo_talleres->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection