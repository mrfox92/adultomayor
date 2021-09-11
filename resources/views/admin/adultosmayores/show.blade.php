@extends('layouts.app')

@section('content')
    <div class="container-fluid my-5">

        <div class="jumbotron my-5">
            <h3 class="text-center text-uppercase">
                Detalle Adulto Mayor: {{ $adultomayor->nombres }} {{ ( $adultomayor->apellidos ) ? $adultomayor->apellidos : '' }}
            </h3>
        </div>
        
        <div class="breadcrumb-area">
            <h1>Inicio</h1>
        
            <ol class="breadcrumb">
                <li class="item"><a href="{{ route('home') }}"><i class='bx bx-home-alt'></i></a></li>
        
                <li class="item"><a href="{{ route('adultosmayores.index') }}">A.M</a></li>
        
                <li class="item">{{ __("Detalle A.M") }}</li>
            </ol>
        </div>

        <div class="card-columns">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Reporte Información Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Este informe genera un reporte en PDF de la información de registro del adulto mayor</p>

                    <a class="btn btn-danger btn-block text-uppercase" href="{{ route('reportes.show', ['id' => $adultomayor->id]) }}" target="_blank">Descargar PDF</a>
                    <button type="button" class="btn btn-primary btn-block text-uppercase" data-toggle="modal" data-target="#modal-{{$adultomayor->id}}">
                        Ver Detalle <i class="bx bx-show-alt"></i>
                    </button>
                    <!-- Modal include -->
                    @include('partials.admin.modal_am.modal', ['item' => $adultomayor])
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Autonomia Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">¿Puede realizar las siguientes actividades de la vida diaria solo/a, sin ayuda de otra persona o sin que le recuerden?</p>

                    @if ( $autonomia )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('autonomia.edit', ['id' => $adultomayor->id]) }}">Editar Ficha</a>
                        <a class="btn btn-danger btn-block text-uppercase" href="{{ route('autonomia.show', ['id' => $adultomayor->id]) }}" target="_blank">Descargar PDF</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('autonomia.create', ['id' => $adultomayor->id]) }}">Registrar</a>
                    @endif
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Identificación de la persona mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">¿Pertenece el adulto mayor a uno o más pueblos indígenas?</p>

                    @if ( $am_etnia )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('identificacion.show', ['id' => $adultomayor->id]) }}">Administrar</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('identificacion.show', ['id' => $adultomayor->id]) }}">Registrar</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha acompañante adulto mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">¿Con quién vive el adulto mayor? llenar la ficha únicamente si el adulto mayor tiene algun acompañante.</p>

                    @if ( $acompanante )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('acompanante.edit', ['id' => $adultomayor->id]) }}">Editar Ficha</a>
                        <form class="my-2" method="POST" action="{{ route('acompanante.destroy', $adultomayor->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                Eliminar <i class="bx bxs-trash"></i>
                            </button>
                        </form>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('acompanante.create', ['id' => $adultomayor->id]) }}">Registrar Ficha</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Habitabilidad Vivienda</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha de condiciones de habitabilidad de vivienda del adulto mayor</p>

                    @if ( $habitabilidad )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('habitabilidad.edit', ['id' => $adultomayor->id]) }}">Editar Ficha</a>
                        <a class="btn btn-danger btn-block text-uppercase" href="{{ route('habitabilidad.show', ['id' => $adultomayor->id]) }}" target="_blank">Descargar PDF</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('habitabilidad.create', ['id' => $adultomayor->id]) }}">Registrar Ficha</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Vivienda Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha para registrar el tipo de vivienda, situación ocupación de su vivienda, entre otros datos requeridos para cada adulto mayor</p>

                    @if ( $vivienda )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('vivienda.edit', ['id' => $adultomayor->id]) }}">Editar Ficha</a>
                        <a class="btn btn-danger btn-block text-uppercase" href="{{ route('vivienda.show', ['id' => $adultomayor->id]) }}" target="_blank">Descargar PDF</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('vivienda.create', ['id' => $adultomayor->id]) }}">Registrar Ficha</a>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Salud Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha salud adulto mayor, datos acerca de estado de salud, centro de salud primario, controles, entre otros datos</p>

                    @if ( $salud )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('salud.edit', ['id' => $adultomayor->id]) }}">Editar Ficha</a>
                        <a class="btn btn-danger btn-block text-uppercase" href="{{ route('salud.show', ['id' => $adultomayor->id]) }}" target="_blank">Descargar PDF</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('salud.create', ['id' => $adultomayor->id]) }}">Registrar Ficha</a>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Discapacidad(es) Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha en donde debe seleccionar en caso de que un adulto mayor presente una o varias discapacidades</p>

                    @if ( $discapacidades )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('discapacidades.show', ['id' => $adultomayor->id]) }}">Administrar</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('discapacidades.show', ['id' => $adultomayor->id]) }}">Ver Discapacidad(es)</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Inscripción Taller(es) para Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha para inscripción a los distintos talleres dispuestos para el Adulto Mayor</p>

                    @if ( $talleram )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('talleram.show', ['id' => $adultomayor->id]) }}">Administrar</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('talleram.show', ['id' => $adultomayor->id]) }}">Registrar</a>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Inscripción Actividad(es) para Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha para inscripción a la(s) distinta(s) actividad(es) dispuesta(s) para el Adulto Mayor</p>

                    @if ( $actividadam )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('actividadam.show', ['id' => $adultomayor->id]) }}">Administrar</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('actividadam.show', ['id' => $adultomayor->id]) }}">Registrar</a>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ayuda(s) técnica(s)</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha en donde se establecen la(s) ayuda(s) técnica(s) que pudiera requerir el Adulto Mayor</p>

                    @if ( $amAyudaTecnica )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('amayudastecnica.show', ['id' => $adultomayor->id]) }}">Administrar Ayuda(s) Técnica(s)</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('amayudastecnica.show', ['id' => $adultomayor->id]) }}">Registrar</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Atencion(es)</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha en donde se establecen la(s) atencion(es) que pudiera requerir el Adulto Mayor</p>

                    @if ( $amAtencion )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('atencionesam.show', ['id' => $adultomayor->id]) }}">Administrar Atencion(es)</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('atencionesam.show', ['id' => $adultomayor->id]) }}">Registrar Atencion(es)</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Trabajo(s) en Baño</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha en donde se establece trabajo(s) para el baño del Adulto Mayor. Pudiendo ser requeridos en casos de problema(s) puntual(es) relacionado(s) con la habitabilidad de la vivienda</p>

                    @if ( $amTrabajoBano )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('trabajosbanoam.show', ['id' => $adultomayor->id]) }}">Administrar Trabajo(s) Baño</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('trabajosbanoam.show', ['id' => $adultomayor->id]) }}">Registrar Trabajo(s) Baño</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Inscripción Programa(s) para Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha para inscripción adulto mayor a diferente(s) programa(s) disponibles</p>

                    @if ( $amPrograma )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('amprograma.show', ['id' => $adultomayor->id]) }}">Administrar</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('amprograma.show', ['id' => $adultomayor->id]) }}">Registrar</a>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">Ficha Red(es) Adulto Mayor</h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Ficha para inscripción las diferentes redes que conoce el adulto mayor</p>

                    @if ( $amRed )
                        <a class="btn btn-primary btn-block text-uppercase" href="{{ route('amred.show', ['id' => $adultomayor->id]) }}">Administrar</a>
                    @else
                        <a class="btn btn-success btn-block text-uppercase" href="{{ route('amred.show', ['id' => $adultomayor->id]) }}">Registrar</a>
                    @endif

                </div>
            </div>
            <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-uppercase">Ficha Tipo(s) Prevision(es) Adulto Mayor</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Ficha para inscripción de tipos de prevision(es) que recibe el/la adulto mayor</p>

                        @if ( $amIngreso )
                            <a class="btn btn-primary btn-block text-uppercase" href="{{ route('amingresos.show', ['id' => $adultomayor->id]) }}">Administrar</a>
                        @else
                            <a class="btn btn-success btn-block text-uppercase" href="{{ route('amingresos.show', ['id' => $adultomayor->id]) }}">Registrar</a>
                        @endif

                    </div>
                </div>
            </div>
    </div>
@endsection