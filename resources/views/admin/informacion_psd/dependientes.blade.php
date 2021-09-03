<table>
    <thead>
        <tr>

            <td>Nombre lugar de trabajo</td>
            <td>Dirección lugar de trabajo</td>
            <td>Telefono lugar de trabajo</td>
            <td>Correo electrónico lugar de trabajo</td>
            <td>Cargo lugar de trabajo</td>
            <td>Encargado lugar de trabajo</td>
            <td>Fecha última actualización datos</td>
            <th>PSD</th>
            <th>Rut</th>
            <th>N° Documento</th>
            <td>F. Nacimiento</td>
            <td>Edad</td>
            <td>Dirección</td>
            <td>Telefono</td>
            <td>Sexo PSD</td>
            <th>Nacionalidad</th>
            <td>¿Participa en organizacion(es) civil(es)?</td>
            <th>Observación organizacion(es) civil(es)</th>
            <th>¿Recibe Pensión?</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dependientes as $item)
            <tr>
                <td><span>{{ $item->nombre }}</span></td>
                <td><span>{{ ( $item->direccion ) ? $item->direccion : 'No especificada' }}</span></td>
                <td><span>{{ ( $item->telefono ) ? $item->telefono : 'No especificado' }}</span></td>
                <td><span>{{ ( $item->email ) ? $item->email : 'No especificado' }}</span></td>
                <td><span>{{ ( $item->cargo ) ? $item->cargo : 'No especificado' }}</span></td>
                <td><span>{{ ( $item->encargado ) ? $item->encargado : 'No especificado' }}</span></td>
                <td><span>{{ \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y') }}</span></td>
                <td>{{ $item->psd->nombres }} {{ $item->psd->apellidos }}</td>
                <td>{{ $item->psd->rut }}</td>
                <td>{{ $item->psd->num_documento }}</td>
                <td><span>{{ \Carbon\Carbon::parse($item->psd->fecha_nacimiento)->format('d/m/Y') }}</span></td>
                <td><span>{{ \Carbon\Carbon::parse($item->psd->fecha_nacimiento)->age }} Años</span></td>
                <td><span>{{ $item->psd->direccion }}</span></td>
                <td><span>{{ ( $item->psd->telefono ) ? $item->psd->telefono : 'No especificado' }}</span></td>
                <td><span>{{ ( strcmp($item->psd->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span></td>
                <td>{{ $item->psd->nacionalidad->nombre }}</td>
                <td><span>{{ ( strcmp($item->psd->sociedad_civil, 'SI') === 0 ) ? 'SI' : 'NO' }}</span></td>
                <td><span>{{ ($item->psd->obs_sociedad_civil) ? $item->psd->obs_sociedad_civil : 'No Especificada' }}</span></td>
                <td><span>{{ ( strcmp($item->psdrecibe_pension, 'SI') === 0 ) ? 'SI' : 'NO' }}</span></td>
            </tr>
            
        @endforeach
    </tbody>

</table>