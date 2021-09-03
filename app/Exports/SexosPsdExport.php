<?php

namespace App\Exports;

use App\PersonaDiscapacitada;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class SexosPsdExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $psd = PersonaDiscapacitada::with(['nacionalidad'])->get();
        $sexos = $psd->groupBy('sexo');

        return view('admin.informacion_psd.sexos', compact('sexos'));
    }
}
