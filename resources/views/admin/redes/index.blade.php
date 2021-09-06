@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('redes.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar Red</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Red</th>
                        <th>N° Contacto</th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($redes as $red)
                        <tr>
                            <td>{{ $red->id }}</td>
                            <td>{{ $red->nombre }}</td>
                            <td>{{ ( $red->num_contacto ) ? $red->num_contacto : 'no especificado' }}</td>
                            <td colspan="3">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('redes.edit', $red->id) }}">Editar <i class="bx bx-edit"></i></a>
                                        <form class="my-2" method="POST" action="{{ route('redes.destroy', $red->id) }}">
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
                    {{ $redes->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection