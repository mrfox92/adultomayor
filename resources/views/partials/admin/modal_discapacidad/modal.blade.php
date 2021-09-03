<!-- Modal -->
<div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="modal-{{$item->id}}">Detalle discapacidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <h6 class="text-uppercase">Archivo evidencia</h6>
            @if ( isset($item->picture) && !empty($item->picture) )
                
                <img src="{{ $item->pathAttachment() }}" class="card-img-top" alt="{{ $item->name }}">
            @else
                <span>No tiene imagen de evidencia</span>
            @endif

            <hr>
            <h6 class="text-uppercase">Tipo discapacidad</h6>
            <hr>
            @switch($item->tipoDiscapacidad->id)
            
                @case(1)
                    <div>
                        <span class="badge badge-pill badge-primary">{{ $item->tipoDiscapacidad->nombre }}</span>
                    </div>
                    @break

                @case(2)
                    <span class="badge badge-pill badge-secondary">{{ $item->tipoDiscapacidad->nombre }}</span>
                    @break

                @case(3)
                    <span class="badge badge-pill badge-success">{{ $item->tipoDiscapacidad->nombre }}</span>
                    @break

                @case(4)
                    <span class="badge badge-pill badge-danger">{{ $item->tipoDiscapacidad->nombre }}</span>
                    @break

                @case(5)
                    <span class="badge badge-pill badge-warning">{{ $item->tipoDiscapacidad->nombre }}</span>
                    @break
                @case(6)
                    <span class="badge badge-pill badge-info">{{ $item->tipoDiscapacidad->nombre }}</span>
                    @break
                @case(7)
                    <span class="badge badge-pill badge-light">{{ $item->tipoDiscapacidad->nombre }}</span>
                    @break
                @case(8)
                    <span class="badge badge-pill badge-dark">{{ $item->tipoDiscapacidad->nombre }}</span>
                @break

            @endswitch
            <hr>
            <h6 class="text-uppercase">Nombre discapacidad</h6>
            <p>{{ $item->nombre }}</p>
            <hr>
            <hr>
            <h6 class="text-uppercase">Observación</h6>
            <p>{{ $item->observacion }}</p>
            <hr>
            <h6 class="text-uppercase">Porcentaje discapacidad</h6>
            <span>{{ $item->porcentaje_discapacidad }}%</span>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>