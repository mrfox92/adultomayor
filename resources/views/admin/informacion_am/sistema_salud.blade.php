<table>
    <thead>
        <tr>
            <th>Institución Salud</th>
            <th>Adulto Mayor</th>
            <th>Rut</th>
            <th>N° Documento</th>
            <th>F. Nacimiento</th>
            <th>Edad</th>
            <th>Sexo adulto mayor</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Nivel Alfabetización</th>
            <th>Porcentaje RSH</th>
            <th>Club adulto mayor</th>
            <th>Tipo de vivienda</th>
            <th>Nucleo familiar</th>
            <th>Nacionalidad</th>
            <th>¿Recibe medicamentos?</th>
            <th>Observación medicamento</th>
            <th>¿Tiene emprendimiento?</th>
            <th>Observación emprendimiento</th>
            <th>¿Necesita atención pañales?</th>
            <th>Observación pañales</th>
            <th>¿Está postrado?</th>
            <th>Observación postrado</th>
            <th>¿Habitabilidad Vivienda?</th>
            <th>Observación Habitabilidad Vivienda</th>
            <th>¿Postulación FOSIS?</th>
            <th>Observación FOSIS</th>
            <th>Fecha Postulación FOSIS</th>
            <th>¿Se encuentra a cargo del cuidado de niños/as y/o una persona enferma o que requiere cuidados permanentes?</th>
            <th>¿Se encuentra a cargo del cuidado de alguna persona en situación de discapacidad?</th>
            <th>¿Se encuentra inscrito/a en CONADI?</th>
            <th>¿Ha sido vacunado contra el COVID-19?</th>
            <th>Observación sobre Vacuna</th>
            <th>¿Tiene sus controles al día en sistema salud primaria?</th>
            <th>Observación sobre controles salud</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($institucionesSalud as $institucionSalud)
            @foreach ($institucionSalud as $item)

                <tr>
                    <td><span>{{ $item->institucionSalud->nombre }}</span></td>
                    <td>{{ $item->nombres }} {{ $item->apellidos }}</td>
                    <td>{{ $item->rut }}</td>
                    <td>{{ $item->num_documento }}</td>
                    <td><span>{{ \Carbon\Carbon::parse($item->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                    <td><span>{{ \Carbon\Carbon::parse($item->fecha_nacimiento)->age }} Años</span></td>
                    <td><span>{{ ( strcmp($item->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span></td>
                    <td><span>{{ $item->direccion }}</span></td>
                    <td><span>{{ ( $item->telefono ) ? $item->telefono : 'No especificado' }}</span></td>
                    <td><span>{{ $item->alfabetizacion->nombre }}</span></td>
                    <td><span>{{ $item->porcentaje_rsh }}%</span></td>
                    <td><span>{{ ($item->estado_club_am == 'Quiere participar') ? 'Quiere participar' : 'No participa' }}</span></td>
                    <td><span>{{ $item->tipoVivienda->nombre }}</span></td>
                    <td><span>{{ $item->nucleoFamiliar->nombre }}</span></td>
                    <td>{{ $item->nacionalidad->nombre }}</td>
                    <td><span>{{ ($item->recibe_medicamentos == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->obs_medicamentos) ? $item->obs_medicamentos : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->emprendimiento == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->obs_emprendimiento) ? $item->obs_emprendimiento : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->atencion_panales == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->obs_panales) ? $item->obs_panales : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->postrado == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->obs_postrado) ? $item->obs_postrado : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->habitabilidad_casa == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->obs_hab_casa) ? $item->obs_hab_casa : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->postulacion_fosis == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->obs_fosis) ? $item->obs_fosis : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->fecha_postulacion_fosis ) ? \Carbon\Carbon::parse($item->fecha_postulacion_fosis)->format('d/m/Y') : 'No Especificada' }}</span></td>
                    <td>
                        <span>
                            @switch($item->cuidado_ninos)
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
                    <td><span>{{ ($item->cuidado_psd == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td>
                        <span>
                            @switch($item->inscripcion_conadi)
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
                    <td><span>{{ ($item->vacunado == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->obs_vacunado) ? $item->obs_vacunado : 'No Espcificada' }}</span></td>
                    <td><span>{{ ( strcmp($item->controles_dia, 'SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->obs_controles) ? $item->obs_controles : 'No Especificada' }}</span></td>
                </tr>
            
            @endforeach
        @endforeach
    </tbody>

</table>