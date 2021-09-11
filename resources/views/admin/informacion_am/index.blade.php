@extends('layouts.app')

@section('content')
    <div class="container-fluid my-5">
        <div class="jumbotron">
            <h3 class="text-center text-uppercase">
                Registros agrupados Adultos mayores
            </h3>
        </div>

        <div class="card-columns">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Nacionalidades</h3>
                </div>
                <div class="card-body">
                    <p class="text-left">Adultos mayores agrupados por nacionalidades</p>

                    <a href="{{ route('informacionam.export') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Etnias</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por etnias - pueblos originarios</p>

                    <a href="{{ route('informacionam.etnias') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Talleres</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por talleres</p>

                    <a href="{{ route('informacionam.talleres') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Sistema Salud</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por sistema salud primaria</p>
        
                    <a href="{{ route('informacionam.instituciones') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Nucleo Familiar</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por nucleo familiar</p>

                    <a href="{{ route('informacionam.nucleosfamiliares') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Previsión</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por sistema Prevision</p>

                    <a href="{{ route('informacionam.previsiones') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Tipo Vivienda</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por tipo vivienda</p>
        
                    <a href="{{ route('informacionam.tipoviviendas') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Nivel Alfabetizacion</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por nivel alfabetizacion</p>

                    <a href="{{ route('informacionam.alfabetizacion') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Actividades</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por actividades</p>

                    <a href="{{ route('informacionam.actividades') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Programas</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por programas</p>
        
                    <a href="{{ route('informacionam.programas') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ayudas Técnicas</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por ayudas técnicas</p>

                    <a href="{{ route('informacionam.ayudastecnicas') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Atenciones</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por atenciones</p>

                    <a href="{{ route('informacionam.atenciones') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Sexos</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por sexo</p>
        
                    <a href="{{ route('informacionam.sexos') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Vacunados Covid-19</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por vacunados y no vacunados</p>

                    <a href="{{ route('informacionam.vacunados') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Tipo Discapacidades</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Adultos mayores agrupados por tipo discapacidades</p>

                    <a href="{{ route('informacionam.discapacidades') }}" type="button" class="btn btn-success btn-block text-uppercase">
                        <i class="fas fa-file-excel"></i> Descargar
                    </a>
                    
                </div>
            </div>

        </div>
        
    </div>
@endsection