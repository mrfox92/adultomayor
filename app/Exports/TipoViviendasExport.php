<?php

namespace App\Exports;

use App\AdultoMayor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TipoViviendasExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AdultoMayor::with(['tipoVivienda'])->get();
        $tipoviviendas = $adultosmayores->groupBy('tipo_vivienda_id');

        return view('admin.informacion_am.tipo_vivienda', compact('tipoviviendas'));
    }
}
