@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row my-5">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('ingresos.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar Tipo Ingreso</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo ingreso</th>
                            <th>Descripción</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ingresos as $ingreso)
                            <tr>
                                <td>{{ $ingreso->id }}</td>
                                <td>{{ $ingreso->nombre }}</td>
                                <td>{{ $ingreso->descripcion }}</td>
                                <td colspan="3">
    
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione acción
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('ingresos.edit', $ingreso->id) }}">Editar <i class="bx bx-edit"></i></a>
                                            <form class="my-2" method="POST" action="{{ route('ingresos.destroy', $ingreso->id) }}">
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
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $ingresos->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection