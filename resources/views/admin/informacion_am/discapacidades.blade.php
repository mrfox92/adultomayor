<table>
    <thead>
        <tr>
            <th>Tipo Discapacidad</th>
            <th>Discapacidad</th>
            <th>Observación discapacidad</th>
            <th>Adulto Mayor</th>
            <th>Rut</th>
            <th>N° Documento</th>
            <td>F. Nacimiento</td>
            <td>Edad</td>
            <td>Sexo adulto mayor</td>
            <td>Dirección</td>
            <td>Telefono</td>
            <td>Nacionalidad</td>
            <td>Nivel Alfabetización</td>
            <td>Porcentaje RSH</td>
            <td>Club adulto mayor</td>
            <td>Tipo de vivienda</td>
            <td>Nucleo familiar</td>
            <th>Institución Salud</th>
            <td>¿Recibe medicamentos?</td>
            <td>Observación medicamento</td>
            <td>¿Tiene emprendimiento?</td>
            <td>Observación emprendimiento</td>
            <td>¿Necesita atención pañales?</td>
            <td>Observación pañales</td>
            <td>¿Está postrado?</td>
            <td>Observación postrado</td>
            <td>¿Habitabilidad Vivienda?</td>
            <td>Observación Habitabilidad Vivienda</td>
            <td>¿Postulación FOSIS?</td>
            <td>Observación FOSIS</td>
            <td>Fecha Postulación FOSIS</td>
            <td>¿Se encuentra a cargo del cuidado de niños/as y/o una persona enferma o que requiere cuidados permanentes?</td>
            <td>¿Se encuentra a cargo del cuidado de alguna persona en situación de discapacidad?</td>
            <td>¿Se encuentra inscrito/a en CONADI?</td>
            <td>¿Ha sido vacunado contra el COVID-19?</td>
            <td>Observación sobre Vacuna</td>
            <th>¿Tiene sus controles al día en sistema salud primaria?</th>
            <th>Observación sobre controles salud</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($discapacidades as $discapacidad)
            @foreach ($discapacidad as $item)

                <tr>
                    <td>{{ $item->tipoDiscapacidad->nombre }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->observacion }}</td>
                    <td>{{ $item->adultomayor->nombres }} {{ $item->adultoMayor->apellidos }}</td>
                    <td>{{ $item->adultomayor->rut }}</td>
                    <td>{{ $item->adultomayor->num_documento }}</td>
                    <td><span>{{ \Carbon\Carbon::parse($item->adultomayor->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                    <td><span>{{ \Carbon\Carbon::parse($item->adultomayor->fecha_nacimiento)->age }} Años</span></td>
                    <td><span>{{ ( strcmp($item->adultomayor->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span></td>
                    <td><span>{{ $item->adultomayor->direccion }}</span></td>
                    <td><span>{{ ( $item->adultomayor->telefono ) ? $item->adultoMayor->telefono : 'No especificado' }}</span></td>
                    <td><span>{{ $item->adultomayor->nacionalidad->nombre }}</span></td>
                    <td><span>{{ $item->adultomayor->alfabetizacion->nombre }}</span></td>
                    <td><span>{{ $item->adultomayor->porcentaje_rsh }}%</span></td>
                    <td><span>{{ ($item->adultomayor->estado_club_am == 'Quiere participar') ? 'Quiere participar' : 'No participa' }}</span></td>
                    <td><span>{{ $item->adultomayor->tipoVivienda->nombre }}</span></td>
                    <td><span>{{ $item->adultomayor->nucleoFamiliar->nombre }}</span></td>
                    <td><span>{{ $item->adultomayor->institucionSalud->nombre }}</span></td>
                    <td><span>{{ ($item->adultomayor->recibe_medicamentos == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultomayor->obs_medicamentos) ? $item->adultomayor->obs_medicamentos : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultomayor->emprendimiento == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultomayor->obs_emprendimiento) ? $item->adultomayor->obs_emprendimiento : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultomayor->atencion_panales == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultomayor->obs_panales) ? $item->adultomayor->obs_panales : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultomayor->postrado == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultomayor->obs_postrado) ? $item->adultomayor->obs_postrado : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultomayor->habitabilidad_casa == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultomayor->obs_hab_casa) ? $item->adultomayor->obs_hab_casa : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultomayor->postulacion_fosis == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultomayor->obs_fosis) ? $item->adultomayor->obs_fosis : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultomayor->fecha_postulacion_fosis ) ? \Carbon\Carbon::parse($item->adultomayor->fecha_postulacion_fosis)->format('d/m/Y') : 'No Especificada' }}</span></td>
                    <td>
                        <span>
                            @switch($item->adultomayor->cuidado_ninos)
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
                    <td><span>{{ ($item->adultomayor->cuidado_psd == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td>
                        <span>
                            @switch($item->adultomayor->inscripcion_conadi)
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
                    <td><span>{{ ($item->adultomayor->vacunado == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultomayor->obs_vacunado) ? $item->adultomayor->obs_vacunado : 'No Espcificada' }}</span></td>
                    <td><span>{{ ( strcmp($item->adultomayor->controles_dia, 'SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultomayor->obs_controles) ? $item->adultomayor->obs_controles : 'No Especificada' }}</span></td>
                </tr>
            
            @endforeach

        @endforeach

    </tbody>

</table>