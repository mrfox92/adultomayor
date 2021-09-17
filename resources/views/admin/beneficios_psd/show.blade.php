@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('beneficiopsd.create', ['id' => $psd->id]) }}" class="btn btn-primary text-uppercase"><i class="bx bx-save"></i> Inscribir Beneficio Estatal</a>
            </div>
        </div>
    </div>

    <div class="breadcrumb-area">
        <h1>Inicio</h1>
    
        <ol class="breadcrumb">
            <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
            <li class="item"><a href="{{ route('psd.show', ['id' => $psd->id] ) }}"> Fichas PSD </a></li>

            <li class="item">{{ __("Beneficio(s) Estatal(es) ") }} {{ $psd->nombres }} {{ $psd->apellidos }}</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-stripped my-5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Beneficio estatal</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beneficios as $beneficio)
                            <tr>
                                <td>{{ $beneficio->id }}</td>
                                <td>
                                    {{ $beneficio->beneficioEstatal()->first()->nombre }}
                                </td>
    
                                <td colspan="3">
    
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione acción
                                        </button>
                                        <div class="dropdown-menu">
                                            <form class="my-2" method="POST" action="{{ route('beneficiopsd.destroy', $beneficio->id) }}">
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
                                <p>No se han inscrito beneficio(s) estatal(es) para este adulto mayor</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection