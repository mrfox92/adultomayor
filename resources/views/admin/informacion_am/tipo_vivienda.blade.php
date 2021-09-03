<table>
    <thead>
        <tr>
            <th>Tipo Vivienda</th>
            <th>Adulto Mayor</th>
            <th>Rut</th>
            <th>N° Documento</th>
            <td>F. Nacimiento</td>
            <td>Edad</td>
            <td>Sexo adulto mayor</td>
            <td>Dirección</td>
            <td>Telefono</td>
            <th>Nacionalidad</th>
            <td>Nivel Alfabetización</td>
            <td>Porcentaje RSH</td>
            <td>Club adulto mayor</td>
            <td>Tipo de vivienda</td>
            <td>Nucleo familiar</td>
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
        </tr>
    </thead>
    <tbody>
        @foreach ($tipoviviendas as $tipovivienda)
            @foreach ($tipovivienda as $item)

                <tr>
                    <td>{{ $item->tipoVivienda->nombre }}</td>
                    <td>{{ $item->nombres }} {{ $item->apellidos }}</td>
                    <td>{{ $item->rut }}</td>
                    <td>{{ $item->num_documento }}</td>
                    <td><span>{{ \Carbon\Carbon::parse($item->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                    <td><span>{{ \Carbon\Carbon::parse($item->fecha_nacimiento)->age }} Años</span></td>
                    <td><span>{{ ( strcmp($item->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span></td>
                    <td><span>{{ $item->direccion }}</span></td>
                    <td><span>{{ ( $item->telefono ) ? $item->telefono : 'No especificado' }}</span></td>
                    <td>{{ $item->nacionalidad->nombre }}</td>
                    <td><span>{{ $item->alfabetizacion->nombre }}</span></td>
                    <td><span>{{ $item->porcentaje_rsh }}%</span></td>
                    <td><span>{{ ($item->estado_club_am == 'Quiere participar') ? 'Quiere participar' : 'No participa' }}</span></td>
                    <td><span>{{ $item->tipoVivienda->nombre }}</span></td>
                    <td><span>{{ $item->nucleoFamiliar->nombre }}</span></td>
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
                    
                </tr>
            
            @endforeach
        @endforeach
    </tbody>

</table>