@extends('layouts.app')

@section('content')
    <div class="container-fluid my-5">
        <div class="jumbotron">
            <h3 class="text-center text-uppercase">
                Registros agrupados Personas situación discapacidad
            </h3>
        </div>

        <div class="row my-5">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Nacionalidades</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-left">Adultos mayores agrupados por nacionalidades</p>

                        <a href="{{ route('informacionpsd.nacionalidades') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Beneficios Estatales</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">PSD agrupados por beneficios estatales</p>
            
                        <a href="{{ route('informacionpsd.beneficios') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Estudiantes</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Aquellas PSD que actualmente son estudiantes</p>

                        <a href="{{ route('informacionpsd.establecimientos') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Trabajadores Dependientes</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">PSD agrupados por Trabajadores dependientes - solo aquellos que actualmente son trabajadores dependientes</p>
            
                        <a href="{{ route('informacionpsd.dependientes') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Trabajadores Independientes</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">PSD agrupados por Trabajadores dependientes - solo aquellos que actualmente son trabajadores dependientes</p>

                        <a href="{{ route('informacionpsd.independientes') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Otras actividades</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">PSD agrupados por otras actividades - solo aquellos que actualmente realizan otras actividades</p>

                        <a href="{{ route('informacionpsd.otras') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Pensiones</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">PSD agrupados por quienes reciben pensión y quienes no</p>

                        <a href="{{ route('informacionpsd.pensiones') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Tipo Discapacidades</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">PSD agrupados por tipo discapacidad</p>

                        <a href="{{ route('informacionpsd.discapacidades') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Sexo PSD</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">PSD agrupados por tipo discapacidad</p>

                        <a href="{{ route('informacionpsd.sexos') }}" type="button" class="btn btn-success btn-block text-uppercase">
                            <i class="fas fa-file-excel"></i> Descargar
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection