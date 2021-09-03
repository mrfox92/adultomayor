<!-- Modal -->
<div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="modal-{{$item->id}}">Detalle Adulto Mayor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <h6 class="text-uppercase">Foto Adulto Mayor</h6>
            @if ( isset($item->picture) && !empty($item->picture) )
                
                <img src="{{ $item->pathAttachment() }}" class="card-img-top" alt="{{ $item->nombres }}">
            @else
                <span>No tiene foto</span>
            @endif
            <hr>
            <h6 class="text-uppercase">Rut</h6>
            <p>{{ $item->rut }}</p>
            <hr>
            <h6 class="text-uppercase">N° Documento</h6>
            <p>{{ $item->num_documento }}</p>
            <hr>
            <h6 class="text-uppercase">Nombre completo</h6>
            <span class="text-capitalize">{{ $item->nombres }} {{ $item->apellidos }}</span>
            <hr>
            <h6 class="text-uppercase">Fecha Nacimiento</h6>
            <p>{{ \Carbon\Carbon::parse($item->fecha_nacimiento)->format('d/m/Y') }}</p>
            <hr>
            <h6 class="text-uppercase">Edad</h6>
            <p>{{ \Carbon\Carbon::parse($adultomayor->fecha_nacimiento)->age }} Años</p>
            <hr>
            <h6 class="text-uppercase">Sexo</h6>
            <span>{{ ( strcmp($item->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span>
            <hr>
            <h6 class="text-uppercase">Dirección</h6>
            <p>{{ $adultomayor->direccion }}</p>
            <hr>
            <h6 class="text-uppercase">Telefono</h6>
            <p>{{ ( $adultomayor->telefono ) ? $adultomayor->telefono : 'No especificado' }}</p>
            <hr>
            <h6 class="text-uppercase">Nacionalidad</h6>
            <p>{{ $adultomayor->nacionalidad->nombre }}</p>
            <hr>
            <h6 class="text-uppercase">Nivel Alfabetización</h6>
            <p>{{ $adultomayor->alfabetizacion->nombre }}</p>
            <hr>
            <h6 class="text-uppercase">Porcentaje RSH</h6>
            <p>{{ $adultomayor->porcentaje_rsh }}%</p>
            <hr>
            <h6 class="text-uppercase">Club adulto mayor</h6>
            <p>{{ ( strcmp($adultomayor->estado_club_am, 'Quiere participar') === 0) ? 'Quiere participar' : 'No participa' }}</p>
            <hr>
            <h6 class="text-uppercase">Tipo de vivienda</h6>
            <p>{{ $adultomayor->tipoVivienda->nombre }}</p>
            <hr>
            <h6 class="text-uppercase">Nucleo familiar</h6>
            <p>{{ $adultomayor->nucleoFamiliar->nombre }}</p>
            <hr>
            <h6 class="text-uppercase">Sistema Salud</h6>
            <p>{{ $adultomayor->institucionSalud->nombre }}</p>
            <hr>
            <h6 class="text-uppercase">¿Recibe medicamentos?</h6>
            <p>{{ ( strcmp($adultomayor->recibe_medicamentos, 'SI') === 0) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación medicamento</h6>
            <p>{{ ($adultomayor->obs_medicamentos) ? $adultomayor->obs_medicamentos : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Tiene emprendimiento?</h6>
            <p>{{ ( strcmp($adultomayor->emprendimiento, 'SI') === 0 ) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación emprendimiento</h6>
            <p>{{ ($adultomayor->obs_emprendimiento) ? $adultomayor->obs_emprendimiento : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Necesita atención pañales?</h6>
            <p>{{ ( strcmp($adultomayor->atencion_panales, 'SI') === 0 ) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación pañales</h6>
            <p>{{ ($adultomayor->obs_panales) ? $adultomayor->obs_panales : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Está postrado?</h6>
            <p>{{ ( strcmp($adultomayor->postrado, 'SI') === 0 ) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación postrado</h6>
            <p>{{ ($adultomayor->obs_postrado) ? $adultomayor->obs_postrado : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Habitabilidad Vivienda?</h6>
            <p>{{ ( strcmp($adultomayor->habitabilidad_casa, 'SI') === 0 ) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación Habitabilidad Vivienda</h6>
            <p>{{ ($adultomayor->obs_hab_casa) ? $adultomayor->obs_hab_casa : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Postulación FOSIS?</h6>
            <p>{{ ( strcmp($adultomayor->postulacion_fosis, 'SI') === 0 ) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación FOSIS</h6>
            <p>{{ ($adultomayor->obs_fosis) ? $adultomayor->obs_fosis : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">Fecha Postulación FOSIS</h6>
            <p>{{ ($adultomayor->fecha_postulacion_fosis ) ? \Carbon\Carbon::parse($adultomayor->fecha_postulacion_fosis)->format('d/m/Y') : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Se encuentra a cargo del cuidado de niños/as y/o una persona enferma o que requiere cuidados permanentes?</h6>
            <p>
                @switch($adultomayor->cuidado_ninos)
                    @case('SI')
                        Si, tiempo completo
                        @break;
                    @case('A VECES')
                        Si, algunas veces a la semana
                        @break;
                    @case('RARA VEZ')
                        Rara vez
                        @break;
                    @case('NO')
                        Nunca
                        @break;
                @endswitch
            </p>
            <hr>
            <h6 class="text-uppercase">¿Se encuentra a cargo del cuidado de alguna persona en situación de discapacidad?</h6>
            <p>{{ ( strcmp($adultomayor->cuidado_psd, 'SI') === 0 ) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Se encuentra inscrito/a en CONADI?</h6>
            <p>
                @switch($adultomayor->inscripcion_conadi)
                    @case('SI')
                        Si
                        @break;
                    @case('NO')
                        No
                        @break;
                    
                    @case('NO SABE')
                        No sabe
                        @break;
                    @case('NO APLICA')
                        No aplica
                        @break;
                @endswitch
            </p>
            <hr>
            <h6 class="text-uppercase">¿Ha sido vacunado contra el COVID-19?</h6>
            <p>{{ ( strcmp($adultomayor->vacunado, 'SI') === 0 ) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación sobre Vacuna</h6>
            <p>{{ ($adultomayor->obs_vacunado) ? $adultomayor->obs_vacunado : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Tiene sus controles al día en sistema salud primaria?</h6>
            <p>{{ ( strcmp($adultomayor->controles_dia, 'SI') === 0 ) ? 'Si' : 'No' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación sobre controles salud</h6>
            <p>{{ ($adultomayor->obs_controles) ? $adultomayor->obs_controles : 'No Especificada' }}</p>
            <br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>