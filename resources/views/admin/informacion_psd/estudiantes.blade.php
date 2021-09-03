<table>
    <thead>
        <tr>

            <th>Nombre establecimiento</th>
            <th>Direccion establecimiento</th>
            <th>Email establecimiento</th>
            <th>Telefono establecimiento</th>
            <th>Encargado establecimiento</th>
            <th>Curso_actual</th>
            <th>Profesor</th>
            <th>¿Está inscrito en programa PIE?</th>
            <th>Fecha Ultima actualizacion Información estudiante</th>
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
        @foreach ($estudiantes as $item)
            <tr>
                <td><span>{{ $item->nombre }}</span></td>
                <td><span>{{ ( $item->direccion ) ? $item->direccion : 'No especificada' }}</span></td>
                <td><span>{{ ( $item->telefono ) ? $item->telefono : 'No especificado' }}</span></td>
                <td><span>{{ ( $item->email ) ? $item->email : 'No especificado' }}</span></td>
                <td><span>{{ ( $item->encargado ) ? $item->encargado : 'No especificado' }}</span></td>
                <td><span>{{ ( $item->curso_actual ) ? $item->curso_actual : 'No especificado' }}</span></td>
                <td><span>{{ ( $item->profesor ) ? $item->profesor : 'No especificado' }}</span></td>
                <td><span>{{ ($item->programa_pie == 'SI') ? 'Si' : 'No' }}</span></td>
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