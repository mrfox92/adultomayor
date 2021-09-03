<?php

namespace App\Exports;

use App\AdultoMayor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class InstitucionSaludExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        $adultosmayores = AdultoMayor::with(['institucionSalud'])->get();
        $institucionesSalud = $adultosmayores->groupBy('institucion_salud_id');

        return view('admin.informacion_am.sistema_salud', compact('institucionesSalud'));
    }
}
