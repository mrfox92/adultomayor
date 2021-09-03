<?php

namespace App\Exports;

use App\AmAtencion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AtencionesExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AmAtencion::with(['atencion','adultoMayor'])->get();
        $atenciones = $adultosmayores->groupBy('atencion_id');

        return view('admin.informacion_am.atenciones', compact('atenciones'));
    }
}
