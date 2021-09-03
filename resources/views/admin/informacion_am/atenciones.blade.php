<table>
    <thead>
        <tr>
            <th>Atención</th>
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
        @foreach ($atenciones as $atencion)
            @foreach ($atencion as $item)

                <tr>
                    <td>{{ $item->atencion->nombre }}</td>
                    <td>{{ $item->adultoMayor->nombres }} {{ $item->adultoMayor->apellidos }}</td>
                    <td>{{ $item->adultoMayor->rut }}</td>
                    <td>{{ $item->adultoMayor->num_documento }}</td>
                    <td><span>{{ \Carbon\Carbon::parse($item->adultoMayor->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                    <td><span>{{ \Carbon\Carbon::parse($item->adultoMayor->fecha_nacimiento)->age }} Años</span></td>
                    <td><span>{{ ( strcmp($item->adultoMayor->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span></td>
                    <td><span>{{ $item->adultoMayor->direccion }}</span></td>
                    <td><span>{{ ( $item->adultoMayor->telefono ) ? $item->adultoMayor->telefono : 'No especificado' }}</span></td>
                    <td><span>{{ $item->adultoMayor->nacionalidad->nombre }}</span></td>
                    <td><span>{{ $item->adultoMayor->alfabetizacion->nombre }}</span></td>
                    <td><span>{{ $item->adultoMayor->porcentaje_rsh }}%</span></td>
                    <td><span>{{ ($item->adultoMayor->estado_club_am == 'Quiere participar') ? 'Quiere participar' : 'No participa' }}</span></td>
                    <td><span>{{ $item->adultoMayor->tipoVivienda->nombre }}</span></td>
                    <td><span>{{ $item->adultoMayor->nucleoFamiliar->nombre }}</span></td>
                    <td><span>{{ $item->adultoMayor->institucionSalud->nombre }}</span></td>
                    <td><span>{{ ($item->adultoMayor->recibe_medicamentos == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->obs_medicamentos) ? $item->adultoMayor->obs_medicamentos : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->emprendimiento == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->obs_emprendimiento) ? $item->adultoMayor->obs_emprendimiento : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->atencion_panales == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->obs_panales) ? $item->adultoMayor->obs_panales : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->postrado == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->obs_postrado) ? $item->adultoMayor->obs_postrado : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->habitabilidad_casa == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->obs_hab_casa) ? $item->adultoMayor->obs_hab_casa : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->postulacion_fosis == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->obs_fosis) ? $item->adultoMayor->obs_fosis : 'No Especificada' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->fecha_postulacion_fosis ) ? \Carbon\Carbon::parse($item->adultoMayor->fecha_postulacion_fosis)->format('d/m/Y') : 'No Especificada' }}</span></td>
                    <td>
                        <span>
                            @switch($item->adultoMayor->cuidado_ninos)
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
                    <td><span>{{ ($item->adultoMayor->cuidado_psd == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td>
                        <span>
                            @switch($item->adultoMayor->inscripcion_conadi)
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
                    <td><span>{{ ($item->adultoMayor->vacunado == 'SI') ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->obs_vacunado) ? $item->adultoMayor->obs_vacunado : 'No Espcificada' }}</span></td>
                    <td><span>{{ ( strcmp($item->adultoMayor->controles_dia, 'SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ($item->adultoMayor->obs_controles) ? $item->adultoMayor->obs_controles : 'No Especificada' }}</span></td>
                </tr>
            
            @endforeach

        @endforeach

    </tbody>

</table>