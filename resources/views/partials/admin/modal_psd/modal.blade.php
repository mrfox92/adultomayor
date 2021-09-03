<!-- Modal -->
<div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="modal-{{$item->id}}">Detalle PSD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <h6 class="text-uppercase">Foto PSD</h6>
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
            <p>{{ \Carbon\Carbon::parse($psd->fecha_nacimiento)->age }} Años</p>
            <hr>
            <h6 class="text-uppercase">Sexo</h6>
            <span>{{ ( strcmp($item->sexo, 'F') === 0 ) ? 'Femenino' : 'Masculino' }}</span>
            <hr>
            <h6 class="text-uppercase">¿Pertenece a alguna(s) organizacion(es) Social(es)?</h6>
            <p>{{ ( strcmp($psd->sociedad_civil, 'SI') === 0 ) ? 'SI' : 'NO' }}</p>
            <hr>
            <h6 class="text-uppercase">Observación organizacion(es) Social(es)</h6>
            <p>{{ ($psd->obs_sociedad_civil) ? $psd->obs_sociedad_civil : 'No Especificada' }}</p>
            <hr>
            <h6 class="text-uppercase">¿Recibe Pensión?</h6>
            <p>{{ ( strcmp($psd->recibe_pension, 'SI') === 0 ) ? 'SI' : 'NO' }}</p>
            <hr>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>