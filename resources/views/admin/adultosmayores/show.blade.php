@extends('layouts.app')

@section('content')
    <div class="container-fluid my-5">
        <div class="jumbotron">
            <h3 class="text-center text-uppercase">
                Detalle Adulto Mayor: {{ $adultomayor->nombres }} {{ ( $adultomayor->apellidos ) ? $adultomayor->apellidos : '' }}
            </h3>
        </div>

        <div class="row my-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ficha Autonomia Adulto Mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">¿Puede realizar las siguientes actividades de la vida diaria solo/a, sin ayuda de otra persona o sin que le recuerden?</p>

                        @if ( $autonomia )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('autonomia.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Autonomia Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('autonomia.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Autonomia Adulto Mayor</a>
                        @endif
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ficha Identificación de la persona mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">¿Pertenece el adulto mayor a uno o más pueblos indígenas?</p>

                        @if ( $am_etnia )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('identificacion.show', ['id' => $adultomayor->id]) }}">Ver Ficha Pueblos Indígenas Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('identificacion.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Pueblos Indígenas Adulto Mayor</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ficha con quien vive el adulto mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">¿Con quién vive el adulto mayor?</p>

                        @if ( $acompanante )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('acompanante.edit', ['id' => $adultomayor->id]) }}">Editar Ficha con quien vive el Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('acompanante.create', ['id' => $adultomayor->id]) }}">Registrar Ficha con quien vive el Adulto Mayor</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Habitabilidad Vivienda</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha de condiciones de habitabilidad de vivienda del adulto mayor</p>

                        @if ( $habitabilidad )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('habitabilidad.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Habitabilidad Vivienda</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('habitabilidad.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Habitabilidad Vivienda</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ficha Vivienda Adulto Mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha para registrar el tipo de vivienda, situación ocupación de su vivienda, entre otros datos requeridos para cada adulto mayor</p>

                        @if ( $vivienda )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('vivienda.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Vivienda</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('vivienda.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Vivienda</a>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ficha Salud Adulto Mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha salud adulto mayor, datos acerca de estado de salud, centro de salud primario, controles, entre otros datos</p>

                        @if ( $salud )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('salud.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Vivienda</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('salud.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Vivienda</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Discapacidad(es) Adulto Mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha en donde debe seleccionar en caso de que un adulto mayor presente una o varias discapacidades</p>

                        {{-- @if ( $habitabilidad )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('habitabilidad.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Discapacidad(es) Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('habitabilidad.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Discapacidad(es) Adulto Mayor</a>
                        @endif --}}
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('discapacidades.show', ['id' => $adultomayor->id]) }}">Ver Ficha Discapacidad(es) Adulto Mayor</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ficha Inscripción Taller(es) para Adulto Mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha para inscripción a los distintos talleres dispuestos para el Adulto Mayor</p>

                        @if ( $vivienda )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('vivienda.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Taller(es) Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('vivienda.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Taller(es) Adulto Mayor</a>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ficha Inscripción Actividad(es) para Adulto Mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha para inscripción a la(s) distinta(s) actividad(es) dispuesta(s) para el Adulto Mayor</p>

                        @if ( $vivienda )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('vivienda.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Actividad(es) Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('vivienda.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Actividad(es) Adulto Mayor</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>


        <div class="row my-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ayuda(s) técnica(s)</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha en donde se establecen la(s) ayuda(s) técnica(s) que pudiera requerir el Adulto Mayor</p>

                        @if ( $habitabilidad )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('habitabilidad.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Ayuda(s) Técnica(s) Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('habitabilidad.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Ayuda(s) Técnica(s) Adulto Mayor</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Atencion(es)</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha en donde se establecen la(s) atencion(es) que pudiera requerir el Adulto Mayor</p>

                        @if ( $habitabilidad )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('habitabilidad.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Atencion(es) Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('habitabilidad.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Atencion(es) Adulto Mayor</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Trabajo(s) en Baño</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha en donde se establece trabajo(s) para el baño del Adulto Mayor. Pudiendo ser requeridos en casos de problema(s) puntual(es) relacionado(s) con la habitabilidad de la vivienda</p>

                        @if ( $habitabilidad )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('habitabilidad.edit', ['id' => $adultomayor->id]) }}">Editar Ficha Trabajo(s) Baño Adulto Mayor</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('habitabilidad.create', ['id' => $adultomayor->id]) }}">Registrar Ficha Trabajo(s) Baño Adulto Mayor</a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection