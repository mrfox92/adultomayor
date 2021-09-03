<table>
    <thead>
        <tr>
            <th>TipoDiscapacidad</th>
            <th>Discapacidad</th>
            <th>Observación discapacidad</th>
            <th>% Discapacidad</th>
            <th>PSD</th>
            <th>Rut</th>
            <th>N° Documento</th>
            <td>F. Nacimiento</td>
            <td>Edad</td>
            <td>Dirección</td>
            <td>Telefono</td>
            <td>Sexo PSD</td>
            <td>¿Participa en organizacion(es) civil(es)?</td>
            <th>Observación organizacion(es) civil(es)</th>
            <th>¿Recibe Pensión?</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($discapacidades as $discapacidad)
            @foreach ($discapacidad as $item)

                <tr>
                    <td>{{ $item->tipoDiscapacidad->nombre }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->observacion }}</td>
                    <td>{{ ( $item->porcentaje_discapacidad ) ? $item->porcentaje_discapacidad : 'No especificado' }}</td>
                    <td>{{ $item->psd->nombres }} {{ $item->psd->apellidos }}</td>
                    <td>{{ $item->psd->rut }}</td>
                    <td>{{ $item->psd->num_documento }}</td>
                    <td><span>{{ \Carbon\Carbon::parse($item->psd->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                    <td><span>{{ \Carbon\Carbon::parse($item->psd->fecha_nacimiento)->age }} Años</span></td>
                    <td><span>{{ $item->psd->direccion }}</span></td>
                    <td><span>{{ ( $item->psd->telefono ) ? $item->psd->telefono : 'No especificado' }}</span></td>
                    <td><span>{{ ( strcmp($item->psd->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span></td>
                    <td><span>{{ ( strcmp($item->psd->sociedad_civil, 'SI') === 0 ) ? 'SI' : 'NO' }}</span></td>
                    <td><span>{{ ($item->psd->obs_sociedad_civil) ? $item->psd->obs_sociedad_civil : 'No Especificada' }}</span></td>
                    <td><span>{{ ( strcmp($item->psd->recibe_pension, 'SI') === 0 ) ? 'SI' : 'NO' }}</span></td>
                </tr>
            
            @endforeach
        @endforeach
    </tbody>

</table>