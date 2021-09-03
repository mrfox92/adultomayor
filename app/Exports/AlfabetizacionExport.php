<?php

namespace App\Exports;

use App\AdultoMayor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AlfabetizacionExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AdultoMayor::with(['alfabetizacion'])->orderBy('alfabetizacion_id', 'ASC')->get();
        $alfabetizaciones = $adultosmayores->groupBy('alfabetizacion_id');

        return view('admin.informacion_am.alfabetizacion', compact('alfabetizaciones'));
    }
}
