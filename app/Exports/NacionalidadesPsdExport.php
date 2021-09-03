<?php

namespace App\Exports;

use App\PersonaDiscapacitada;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class NacionalidadesPsdExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        $psd = PersonaDiscapacitada::with(['nacionalidad'])->get();
        $nacionalidades = $psd->groupBy('nacionalidad_id');

        return view('admin.informacion_psd.nacionalidades', compact('nacionalidades'));
    }
}
