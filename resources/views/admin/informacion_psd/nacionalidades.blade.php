<table>
    <thead>
        <tr>
            <th>Nacionalidad</th>
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
        @foreach ($nacionalidades as $nacionalidad)
            @foreach ($nacionalidad as $item)

                <tr>
                    <td>{{ $item->nacionalidad->nombre }}</td>
                    <td>{{ $item->nombres }} {{ $item->apellidos }}</td>
                    <td>{{ $item->rut }}</td>
                    <td>{{ $item->num_documento }}</td>
                    <td><span>{{ \Carbon\Carbon::parse($item->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                    <td><span>{{ \Carbon\Carbon::parse($item->fecha_nacimiento)->age }} Años</span></td>
                    <td><span>{{ $item->direccion }}</span></td>
                    <td><span>{{ ( $item->telefono ) ? $item->telefono : 'No especificado' }}</span></td>
                    <td><span>{{ ( strcmp($item->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span></td>
                    <td><span>{{ ( strcmp($item->sociedad_civil, 'SI') === 0 ) ? 'SI' : 'NO' }}</span></td>
                    <td><span>{{ ($item->obs_sociedad_civil) ? $item->obs_sociedad_civil : 'No Especificada' }}</span></td>
                    <td><span>{{ ( strcmp($item->recibe_pension, 'SI') === 0 ) ? 'SI' : 'NO' }}</span></td>
                </tr>
            
            @endforeach
        @endforeach
    </tbody>

</table>