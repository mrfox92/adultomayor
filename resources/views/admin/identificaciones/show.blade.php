
@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
    
            <li class="item"><a href="{{ route('identificacion.index') }}">Fichas Identificación étnica</a></li>
    
            <li class="item">{{ __("Editar Ficha Identificación étnica") }}</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Etnia</th>
                        <th>Nombre Adulto Mayor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle_etnias as $etnia)
                        <tr>
                            <td>{{ $etnia->id }}</td>
                            <td>{{ $etnia->etnia->nombre }}</td>
                            <td>
                                <span class="badge badge-secondary">
                                    {{ $etnia->adultoMayor->nombres }} {{ $etnia->adultoMayor->apellidos }}
                                </span>
                            </td>
                            <td colspan="3">
                                {{-- <a href="{{ route('identificacion.edit', ['id' => $etnia->id]) }}" class="btn btn-primary">Editar</a> --}}
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione acción
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('identificacion.edit', $etnia->id) }}">Editar <i class="bx bx-edit"></i></a>
                                        <form class="my-2" method="POST" action="{{ route('identificacion.destroy', $etnia->id) }}">
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    

    {{-- comienzo modal --}}
    <a href="{{ route('identificacion.add', ['id' => $adultomayor->id]) }}" type="button" class="btn btn-primary">
        Agregar Etnia 
    </a>

</div>

@endsection

                            

                            