@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('ayudastecnicas.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar Ayuda Tecnica</a>
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
                            <th>Ayuda Tecnica</th>
                            <th>Descripción</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ayudas_tecnicas as $ayuda_tecnica)
                            <tr>
                                <td>{{ $ayuda_tecnica->id }}</td>
                                <td>{{ $ayuda_tecnica->nombre }}</td>
                                <td>{{ $ayuda_tecnica->descripcion }}</td>
                                <td colspan="3">
    
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione acción
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('ayudastecnicas.edit', $ayuda_tecnica->id) }}">Editar <i class="bx bx-edit"></i></a>
                                            <form class="my-2" method="POST" action="{{ route('ayudastecnicas.destroy', $ayuda_tecnica->id) }}">
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
                    {{ $ayudas_tecnicas->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection