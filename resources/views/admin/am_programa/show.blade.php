@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('amprograma.create', ['id' => $adultomayor->id]) }}" class="btn btn-primary text-uppercase"><i class="bx bx-save"></i> Inscribir Programa</a>
            </div>
        </div>
    </div>

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
            <li class="item"><a href="{{ route('adultosmayores.show', ['id' => $adultomayor->id] ) }}"> Fichas AM </a></li>

            <li class="item">{{ __("Programa(s) ") }} {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-stripped my-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Programa</th>
                        <th>Fecha registro</th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($programas as $programa)
                        <tr>
                            <td>{{ $programa->id }}</td>
                            <td>
                                {{ $programa->programa()->first()->nombre }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse( $programa->created_at )->format('d/m/Y') }}</td>

                            <td colspan="3">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <form class="my-2" method="POST" action="{{ route('amprograma.destroy', $programa->id) }}">
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
                            <p>No se han inscrito programa(s) para este adulto mayor</p>
                        </div>
                    @endforelse
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection