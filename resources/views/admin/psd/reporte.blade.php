<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe PSD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mb-2">
        <div class="text-center">
            <img class="img-fluid" width="60" height="60" src="{{ public_path('img/municipalidad.jpg') }}" alt="">
        </div>
        <p class="float-right text-muted">{{ date('d/m/Y H:i:s') }}</p><br>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron my-2 py-3">
                    <h3 class="text-center text-uppercase">
                        Reporte Información PSD {{ $psd->nombres }} {{ $psd->apellidos }}
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
                            <td><span>{{ $psd->rut }}</span></td>
                        </tr>
                        <tr>
                            <td>N° Documento</td>
                            <td><span>{{ $psd->num_documento }}</span></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><span>{{ $psd->nombres }} {{ $psd->apellidos }}</span></td>
                        </tr>
                        <tr>
                            <td>F. Nacimiento</td>
                            <td><span>{{ \Carbon\Carbon::parse($psd->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                        </tr>
                        <tr>
                            <td>Edad</td>
                            <td><span>{{ \Carbon\Carbon::parse($psd->fecha_nacimiento)->age }} Años</span></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td><span>{{ $psd->direccion }}</span></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><span>{{ $psd->telefono ? $psd->telefono : 'No especificado' }}</span></td>
                        </tr>
                        <tr>
                            <td>Nacionalidad</td>
                            <td><span>{{ $psd->nacionalidad->nombre }}</span></td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td><span>{{ $psd->sexo == 'F' ? 'Femenino' : 'Masculino' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Pertenece a alguna(s) organizacion(es) Social(es)?</td>
                            <td><span>{{ $psd->sociedad_civil == 'SI' ? 'SI' : 'NO' }}</span></td>
                        </tr>
                        <tr>
                            <td>Observación organizacion(es) Social(es)</td>
                            <td><span>{{ $psd->obs_sociedad_civil ? $psd->obs_sociedad_civil : 'No Especificada' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Recibe Pensión?</td>
                            <td><span>{{ $psd->recibe_pension == 'SI' ? 'SI' : 'NO' }}</span></td>
                        </tr>
                        <tr>
                            <td>Estudiante</td>
                            <td>
                                @if (isset($establecimiento) && !empty($establecimiento))
                                    <ul>
                                        <li>Nombre: {{ $establecimiento->nombre }}</li>
                                        <li>Direccion: {{ $establecimiento->direccion }}</li>
                                        <li>Email: {{ $establecimiento->email }}</li>
                                        <li>Telefono: {{ $establecimiento->telefono }}</li>
                                        <li>Encargado: {{ $establecimiento->encargado }}</li>
                                        <li>Curso actual: {{ $establecimiento->curso_actual }}</li>
                                        <li>Profesor: {{ $establecimiento->profesor }}</li>
                                        <li>¿Inscrito en programa PIE?: {{ $establecimiento->programa_pie }}</li>
                                        <li>Ultima actualizacion datos:
                                            {{ \Carbon\Carbon::parse($establecimiento->updated_at)->format('d/m/Y') }}
                                        </li>
                                    </ul>
                                @else
                                    {{ __('No informado') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Trabajador dependiente</td>
                            <td>
                                @if (isset($trabajador) && !empty($trabajador))
                                    <ul>
                                        <li>Nombre: {{ $trabajador->nombre }}</li>
                                        <li>Direccion: {{ $trabajador->direccion }}</li>
                                        <li>Email: {{ $trabajador->email }}</li>
                                        <li>Telefono: {{ $trabajador->telefono }}</li>
                                        <li>Cargo: {{ $trabajador->cargo }}</li>
                                        <li>Encargado: {{ $trabajador->encargado }}</li>
                                        <li>Ultima actualizacion datos:
                                            {{ \Carbon\Carbon::parse($trabajador->updated_at)->format('d/m/Y') }}
                                        </li>
                                    </ul>
                                @else
                                    {{ __('No informado') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Trabajador independiente</td>
                            <td>
                                @if (isset($independiente) && !empty($independiente))
                                    <ul>
                                        <li>Nombre: {{ $independiente->nombre }}</li>
                                        <li>Direccion: {{ $independiente->direccion }}</li>
                                        <li>Email: {{ $independiente->email }}</li>
                                        <li>Telefono: {{ $independiente->telefono }}</li>
                                        <li>Cargo: {{ $independiente->cargo }}</li>
                                        <li>Encargado: {{ $independiente->encargado }}</li>
                                        <li>Ultima actualizacion datos:
                                            {{ \Carbon\Carbon::parse($independiente->updated_at)->format('d/m/Y') }}
                                        </li>
                                    </ul>
                                @else
                                    {{ __('No informado') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Otra ocupación</td>
                            <td>
                                @if (isset($otras) && !empty($otras))
                                    <ul>
                                        <li>Nombre actividad: {{ $otras->nombre }}</li>
                                        <li>Direccion: {{ $otras->direccion }}</li>
                                        <li>Email: {{ $otras->email }}</li>
                                        <li>Telefono: {{ $otras->telefono }}</li>
                                        <li>Cargo: {{ $otras->cargo }}</li>
                                        <li>Encargado: {{ $otras->encargado }}</li>
                                        <li>Ultima actualizacion datos:
                                            {{ \Carbon\Carbon::parse($otras->updated_at)->format('d/m/Y') }}</li>
                                    </ul>
                                @else
                                    {{ __('No informado') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Beneficio(s) Estatal(es) PSD</td>
                            <td>
                                @forelse ($beneficiospsd as $beneficio)
                                    <ul>
                                        <li>{{ $beneficio->beneficioEstatal()->first()->nombre }}</li>
                                    </ul>
                                @empty
                                    No tiene inscrito ningún beneficio estatal a la fecha
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <td>Discapacidad(es) PSD</td>
                            <td>
                                @forelse ($discapacidades as $discapacidad)
                                    <ul>
                                        <li><span>Discapacidad: </span>{{ $discapacidad->nombre }}</li>
                                        <li><span>Tipo discapacidad:
                                            </span>{{ $discapacidad->tipoDiscapacidad()->first()->nombre }}</li>
                                        <li><span>% Discapacidad:</span>
                                            @if (isset($discapacidad->porcentaje_discapacidad) && !empty($discapacidad->porcentaje_discapacidad))
                                                {{ $discapacidad->porcentaje_discapacidad }}%
                                            @else
                                                <span>No especificado</span>
                                            @endif
                                        </li>
                                    </ul>
                                @empty
                                    No tiene inscrita ningún discapacidad en el sistema
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
