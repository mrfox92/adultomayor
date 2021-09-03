<?php

namespace App\Exports;

use App\AmActividad;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ActividadesExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AmActividad::with(['actividad','adultoMayor'])->get();
        $actividades = $adultosmayores->groupBy('actividad_id');

        return view('admin.informacion_am.actividades', compact('actividades'));
    }
}
