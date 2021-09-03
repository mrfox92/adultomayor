<?php

namespace App\Exports;

use App\AdultoMayor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class NucleoFamiliarExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AdultoMayor::with(['nacionalidad', 'nucleoFamiliar'])->get();
        $nucleosfamiliares = $adultosmayores->groupBy('nucleo_familiar_id');

        return view('admin.informacion_am.nucleosfamiliares', compact('nucleosfamiliares'));
    }
}
