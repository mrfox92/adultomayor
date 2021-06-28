<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe Adultos Mayores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-2">
        <p class="float-right">{{ date('d-m-Y H:i:s') }}</p><br>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron my-2 py-3">
                    <h1 class="text-center">
                        Reporte Información Adulto Mayor {{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Datos
                            </th>
                            <th>Información</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td>Rut</td>
                                <td><span>{{ $adultomayor->rut }}</span></td>
                            </tr>
                        </tbody>
                    </thead>
                
                </table> --}}
                    <span><strong>Rut: </strong>{{ $adultomayor->rut }}</span><br>
                    <span><strong>N° Documento: </strong>{{ $adultomayor->num_documento }}</span><br>
                    <span><strong>Nombre: </strong> {{ $adultomayor->nombres }} {{ $adultomayor->nombres }}</span><br>
                    <span><strong>Fecha de Nacimiento: </strong>{{ \Carbon\Carbon::parse($adultomayor->fecha_nacimiento)->format('d/m/Y') }}</span><br>
                    <span><strong>Edad: </strong>{{ \Carbon\Carbon::parse($adultomayor->fecha_nacimiento)->age }} Años</span><br>
                    <span><strong>Dirección: </strong>{{ $adultomayor->direccion }}</span><br>
                    <span><strong>Telefono: </strong>{{ ( $adultomayor->telefono ) ? $adultomayor->telefono : 'No especificado' }}</span><br>
                    <span><strong>Nacionalidad: </strong>{{ $adultomayor->nacionalidad->nombre }}</span><br>
                    <span><strong>Nivel Alfabetizacion: </strong>{{ $adultomayor->alfabetizacion->nombre }}</span><br>
                    <span><strong>Porcenaje RSH: </strong>{{ $adultomayor->porcentaje_rsh }}</span><br>
                    <span><strong>Club Adulto Mayor: </strong>{{ ($adultomayor->estado_club_am == 'Quiere participar') ? 'Quiere participar' : 'No participa' }}</span><br>
                    <span><strong>Tipo de vivienda: </strong>{{ $adultomayor->tipoVivienda->nombre }}</span><br>
                    <span><strong>Nucleo Familiar: </strong>{{ $adultomayor->nucleoFamiliar->nombre }}</span><br>
                    <span><strong>¿Recibe medicamentos?: </strong>{{ ($adultomayor->recibe_medicamentos == 'SI') ? 'Si' : 'No' }}</span><br>
                    <span><strong>Observación Medicamentos: </strong>{{ ($adultomayor->obs_medicamentos) ? $adultomayor->obs_medicamentos : 'No Especificada' }}</span><br>
                    <span><strong>¿Tiene emprendimiento?: </strong>{{ ($adultomayor->emprendimiento == 'SI') ? 'Si' : 'No' }}</span><br>
                    <span><strong>Observación Medicamentos: </strong>{{ ($adultomayor->obs_emprendimiento) ? $adultomayor->obs_emprendimiento : 'No Especificada' }}</span><br>
                    <span><strong>¿Necesita atención pañales?: </strong>{{ ($adultomayor->atencion_panales == 'SI') ? 'Si' : 'No' }}</span><br>
                    <span><strong>Observación Pañales: </strong>{{ ($adultomayor->obs_panales) ? $adultomayor->obs_panales : 'No Especificada' }}</span><br>
                    <span><strong>¿Está postrado?: </strong>{{ ($adultomayor->postrado == 'SI') ? 'Si' : 'No' }}</span><br>
                    <span><strong>Observación Postrado: </strong>{{ ($adultomayor->obs_postrado) ? $adultomayor->obs_postrado : 'No Especificada' }}</span><br>
                    <span><strong>¿Habitabilidad Vivienda?: </strong>{{ ($adultomayor->habitabilidad_casa == 'SI') ? 'Si' : 'No' }}</span><br>
                    <span><strong>Observación Habitabilidad Vivienda: </strong>{{ ($adultomayor->obs_hab_casa) ? $adultomayor->obs_hab_casa : 'No Especificada' }}</span><br>
                    <span><strong>¿Postulación FOSIS?: </strong>{{ ($adultomayor->postulacion_fosis == 'SI') ? 'Si' : 'No' }}</span><br>
                    <span><strong>Observación FOSIS: </strong>{{ ($adultomayor->obs_fosis) ? $adultomayor->obs_fosis : 'No Especificada' }}</span><br>
                    <span><strong>Fecha Postulación FOSIS: </strong>{{ ($adultomayor->fecha_postulacion_fosis ) ? \Carbon\Carbon::parse($adultomayor->fecha_postulacion_fosis)->format('d/m/Y') : 'No Especificada' }}</span><br>
                    <span><strong>¿Se encuentra a cargo del cuidado de niños/as y/o una persona enferma o que requiere cuidados permanentes?: </strong></span>
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
                    <br>
                    <span><strong>¿Se encuentra a cargo del cuidado de alguna persona en situación de discapacidad?: </strong>{{ ($adultomayor->cuidado_psd == 'SI') ? 'Si' : 'No' }}</span><br>
                    <span><strong>¿Se encuentra inscrito/a en CONADI?: </strong></span>
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
                    <br>
                    <span><strong>¿Ha sido Vacunado contra el COVID-19?: </strong>{{ ($adultomayor->vacunado == 'SI') ? 'Si' : 'No' }}</span><br>
                    <span><strong>Observación sobre Vacuna: </strong>{{ ($adultomayor->obs_vacunado) ? $adultomayor->obs_vacunado : 'No Espcificada' }}</span><br>
            </div>
        </div>
    </div>
</body>
</html>