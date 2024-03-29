@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('amayudastecnica.create', ['id' => $adultomayor->id]) }}" class="btn btn-primary text-uppercase"><i class="bx bx-save"></i> Inscribir Ayuda Técnica</a>
            </div>
        </div>
    </div>

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
            <li class="item"><a href="{{ route('adultosmayores.show', ['id' => $adultomayor->id] ) }}"> Fichas AM </a></li>

            <li class="item">{{ __("Ayuda(s) Técnica(s) ") }} {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-stripped my-5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ayuda Técnica</th>
                            <th>Observación</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ayudas_tecnicas as $ayuda_tecnica)
                            <tr>
                                <td>{{ $ayuda_tecnica->id }}</td>
                                <td>
                                    {{ $ayuda_tecnica->ayudaTecnica()->first()->nombre }}
                                </td>
                                <td>{{ $ayuda_tecnica->observacion }}</td>
                                <td colspan="3">
    
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione acción
                                        </button>
                                        <div class="dropdown-menu">
                                            <form class="my-2" method="POST" action="{{ route('amayudastecnica.destroy', $ayuda_tecnica->id) }}">
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
                                <p>No se han inscrito ayuda(s) técnica(s) para este adulto mayor</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection