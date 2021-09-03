<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe Adulto Mayor {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mb-2">
        <div class="text-center">
            <img class="img-fluid" width="60" height="60" src="{{ public_path('img\municipalidad.jpg') }}" alt="">
        </div>
        <p class="float-right text-muted">{{ date('d/m/Y H:i:s') }}</p><br>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron my-2 py-3">
                    <h3 class="text-center text-uppercase">
                        Reporte Información Adulto Mayor {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Datos
                            </th>
                            <th>
                                Información
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rut</td>
                            <td><span>{{ $adultomayor->rut }}</span></td>
                        </tr>
                        <tr>
                            <td>N° Documento</td>
                            <td><span>{{ $adultomayor->num_documento }}</span></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><span>{{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</span></td>
                        </tr>
                        <tr>
                            <td>F. Nacimiento</td>
                            <td><span>{{ \Carbon\Carbon::parse($adultomayor->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                        </tr>
                        <tr>
                            <td>Edad</td>
                            <td><span>{{ \Carbon\Carbon::parse($adultomayor->fecha_nacimiento)->age }} Años</span></td>
                        </tr>
                        <tr>
                            <td>Sexo adulto mayor</td>
                            <td><span>{{ ( strcmp($adultomayor->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td><span>{{ $adultomayor->direccion }}</span></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><span>{{ ( $adultomayor->telefono ) ? $adultomayor->telefono : 'No especificado' }}</span></td>
                        </tr>
                        <tr>
                            <td>Nacionalidad</td>
                            <td><span>{{ $adultomayor->nacionalidad->nombre }}</span></td>
                        </tr>
                        <tr>
                            <td>Nivel Alfabetización</td>
                            <td><span>{{ $adultomayor->alfabetizacion->nombre }}</span></td>
                        </tr>
                        <tr>
                            <td>Porcentaje RSH</td>
                            <td><span>{{ $adultomayor->porcentaje_rsh }}%</span></td>
                        </tr>
                        <tr>
                            <td>Club adulto mayor</td>
                            <td><span>{{ ($adultomayor->estado_club_am == 'Quiere participar') ? 'Quiere participar' : 'No participa' }}</span></td>
                        </tr>
                        <tr>
                            <td>Tipo de vivienda</td>
                            <td><span>{{ $adultomayor->tipoVivienda->nombre }}</span></td>
                        </tr>
                        <tr>
                            <td>Nucleo familiar</td>
                            <td><span>{{ $adultomayor->nucleoFamiliar->nombre }}</span></td>
                        </tr>
                        <tr>
                            <td>Sistema Salud</td>
                            <td><span>{{ $adultomayor->institucionSalud->nombre }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Recibe medicamentos?</td>
                            <td><span>{{ ($adultomayor->recibe_medicamentos == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>Observación medicamento</td>
                            <td><span>{{ ($adultomayor->obs_medicamentos) ? $adultomayor->obs_medicamentos : 'No Especificada' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Tiene emprendimiento?</td>
                            <td><span>{{ ($adultomayor->emprendimiento == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>Observación emprendimiento</td>
                            <td><span>{{ ($adultomayor->obs_emprendimiento) ? $adultomayor->obs_emprendimiento : 'No Especificada' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Necesita atención pañales?</td>
                            <td><span>{{ ($adultomayor->atencion_panales == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>Observación pañales</td>
                            <td><span>{{ ($adultomayor->obs_panales) ? $adultomayor->obs_panales : 'No Especificada' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Está postrado?</td>
                            <td><span>{{ ($adultomayor->postrado == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>Observación postrado</td>
                            <td><span>{{ ($adultomayor->obs_postrado) ? $adultomayor->obs_postrado : 'No Especificada' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Habitabilidad Vivienda?</td>
                            <td><span>{{ ($adultomayor->habitabilidad_casa == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>Observación Habitabilidad Vivienda</td>
                            <td><span>{{ ($adultomayor->obs_hab_casa) ? $adultomayor->obs_hab_casa : 'No Especificada' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Postulación FOSIS?</td>
                            <td><span>{{ ($adultomayor->postulacion_fosis == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>Observación FOSIS</td>
                            <td><span>{{ ($adultomayor->obs_fosis) ? $adultomayor->obs_fosis : 'No Especificada' }}</span></td>
                        </tr>
                        <tr>
                            <td>Fecha Postulación FOSIS</td>
                            <td><span>{{ ($adultomayor->fecha_postulacion_fosis ) ? \Carbon\Carbon::parse($adultomayor->fecha_postulacion_fosis)->format('d/m/Y') : 'No Especificada' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Se encuentra a cargo del cuidado de niños/as y/o una persona enferma o que requiere cuidados permanentes?</td>
                            <td>
                                <span>
                                    @switch($adultomayor->cuidado_ninos)
                                        @case('SI')
                                            <span>Si, tiempo completo</span>
                                            @break;
                                        @case('A VECES')
                                            <span>Si, algunas veces a la semana</span>
                                            @break;
                                        @case('RARA VEZ')
                                            <span>Rara vez</span>
                                            @break;
                                        @case('NO')
                                            <span>Nunca</span>
                                            @break;
                                    @endswitch
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Se encuentra a cargo del cuidado de alguna persona en situación de discapacidad?</td>
                            <td><span>{{ ($adultomayor->cuidado_psd == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Se encuentra inscrito/a en CONADI?</td>
                            <td>
                                <span>
                                    @switch($adultomayor->inscripcion_conadi)
                                        @case('SI')
                                            <span>Si</span>
                                            @break;
                                        @case('NO')
                                            <span>No</span>
                                            @break;
                                        
                                        @case('NO SABE')
                                            <span>No sabe</span>
                                            @break;
                                        @case('NO APLICA')
                                            <span>No aplica</span>
                                            @break;
                                    @endswitch
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Ha sido vacunado contra el COVID-19?</td>
                            <td><span>{{ ($adultomayor->vacunado == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>Observación sobre Vacuna</td>
                            <td><span>{{ ($adultomayor->obs_vacunado) ? $adultomayor->obs_vacunado : 'No Especificada' }}</span></td>
                        </tr>

                        <tr>
                            <td>¿Tiene sus controles al día en sistema salud primaria?</td>
                            <td><span>{{ ( strcmp($adultomayor->controles_dia, 'SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                        </tr>

                        <tr>
                            <td>Observación sobre controles salud</td>
                            <td><span>{{ ($adultomayor->obs_controles) ? $adultomayor->obs_controles : 'No Especificada' }}</span></td>
                        </tr>
                        
                        <tr>
                            <td>Etnia(s)</td>
                            <td>
                                @forelse ($adultomayor->amEtnias as $etnia)
                                    <ul>
                                        <li>{{ $etnia->etnia()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No aplica
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Acompañante Adulto mayor</td>
                            <td>
                                @if ( isset($acompanante) && !empty( $acompanante ) )
                                    <div>
                                        <h6 class="text-center">Datos acompañante adulto mayor</h6>
                                    </div>
                                    <ul>
                                        <li>Sexo acompañante: {{ ( strcmp( $acompanante->sexo_acompanante, 'F' ) === 0 ) ? 'Femenino' : 'Masculino' }}</li>
                                        <li>Edad: {{ $acompanante->edad }} Años</li>
                                        <li>Parentesco:
                                            @switch($acompanante->parentesco_am)
                                                @case('JEFE')
                                                    {{ __("Jefe/a de familia") }}
                                                    @break
                                                @case('CONYUGE')
                                                    {{ __("Cónyuge o pareja") }}
                                                    @break
                                                @case('HIJOAMBOS')
                                                    {{ __("Hijo/a de ambos") }}
                                                    @break
                                                @case('HIJOJEFE')
                                                    {{ __("Hijo/a sólo del/a Jefe/a de familia") }}
                                                    @break
                                                @case('HIJOCONYUGE')
                                                    {{ __("Hijo/a sólo del cónyuge o pareja") }}
                                                    @break
                                                @case('PADRE/MADRE')
                                                    {{ __("Padre o Madre") }}
                                                    @break
                                                @case('SUEGRO')
                                                    {{ __("Suegro") }}
                                                    @break
                                                @case('YERNO/NUERA')
                                                    {{ __("Yerno o Nuera") }}
                                                    @break
                                                @case('NIETO/A')
                                                    {{ __("Nieto/a") }}
                                                    @break
                                                @case('BISNIETO/A')
                                                    {{ __("Bisnieto/a") }}
                                                    @break
                                                @case('HERMANO/A')
                                                    {{ __("Hermano/a") }}
                                                    @break
                                                @case('CUNADO/A')
                                                    {{ __("Cuñado/a") }}
                                                    @break
                                                @case('FAMILIAR')
                                                    {{ __("Otro Familiar") }}
                                                    @break
                                                @case('NOFAMILIAR')
                                                    {{ __("Otro no Familiar") }}
                                                    @break
                                            @endswitch
                                        </li>
                                        <li>
                                            ¿Se encuentra trabajando?: 
                                            @switch($acompanante->estado_trabajo)
                                                @case('FUERA')
                                                    {{ __("Si, fuera del hogar") }}
                                                    @break
                                                @case('DENTRO')
                                                    {{ __("Si, dentro del hogar") }}
                                                    @break
                                                @case('NO')
                                                    {{ __("No") }}
                                                    @break
                                            @endswitch
                                        </li>
                                    </ul>
                                @else
                                    Sin información
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <td>Discapacidad(es)</td>
                            <td>
                                @forelse ($discapacidades as $discapacidad)
                                    <ul>
                                        <li>Discapacidad: {{ $discapacidad->nombre }}</li>
                                        <li>Observación: {{ ( !empty($discapacidad->observacion) ? $discapacidad->observacion : 'No especificada') }}</li>
                                        <li>Tipo: {{ $discapacidad->tipoDiscapacidad()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No aplica
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Taller(es)</td>
                            <td>
                                @forelse ($amTaller as $taller)
                                    <ul>
                                        <li> {{ $taller->taller()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No se encuentra inscrito en ningún taller
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Actividad(es) A.M</td>
                            <td>
                                @forelse ($amActividad as $actividad)
                                    <ul>
                                        <li>{{ $actividad->actividad()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No está inscrito en ninguna actividad A.M
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Red(es) A.M</td>
                            <td>
                                @forelse ($amRedes as $red)
                                    <ul>
                                        <li>{{ $red->red()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No tiene inscrita ninguna red A.M
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Tipo(s) Prevision(es) A.M</td>
                            <td>
                                @forelse ($amIngresos as $ingreso)
                                    <ul>
                                        <li>{{ $ingreso->ingreso()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No tiene inscrito ningún tipo previsión A.M
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Programa(s) A.M</td>
                            <td>
                                @forelse ($amPrograma as $programa)
                                    <ul>
                                        <li>{{ $programa->programa()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No está inscrito en ninguna programa A.M
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Ayuda(s) Técnica(s)</td>
                            <td>
                                @forelse ($amAyudaTecnica as $ayuda_tecnica)
                                    <ul>
                                        <li>{{ $ayuda_tecnica->ayudaTecnica()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No registra ninguna ayuda técnica
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Atencion(es)</td>
                            <td>
                                @forelse ($amAtencion as $atencion)
                                    <ul>
                                        <li>{{ $atencion->atencion()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No registra ninguna atención A.M
                                @endforelse
                            </td>
                        </tr>

                    </tbody>
                
                </table>

            </div>
        </div>
    </div>
</body>
</html>