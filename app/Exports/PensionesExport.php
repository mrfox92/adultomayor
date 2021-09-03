<?php

namespace App\Exports;

use App\PersonaDiscapacitada;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PensionesExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $psd = PersonaDiscapacitada::with(['nacionalidad'])->get();
        $pensiones = $psd->groupBy('recibe_pension');

        return view('admin.informacion_psd.pensiones', compact('pensiones'));
    }
}
