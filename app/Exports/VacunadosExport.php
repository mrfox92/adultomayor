<?php

namespace App\Exports;

use App\AdultoMayor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class VacunadosExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AdultoMayor::with(['nacionalidad'])->get();
        $vacunados = $adultosmayores->groupBy('vacunado');

        return view('admin.informacion_am.vacunados', compact('vacunados'));
    }
}
