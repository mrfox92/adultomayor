<?php

namespace App\Exports;

use App\AmIngreso;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PrevisionesExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AmIngreso::with(['ingreso','adultoMayor'])->get();
        $previsiones = $adultosmayores->groupBy('ingreso_id');

        return view('admin.informacion_am.previsiones', compact('previsiones'));
    }
}
