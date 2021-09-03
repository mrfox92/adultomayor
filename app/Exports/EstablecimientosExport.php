<?php

namespace App\Exports;

use App\EstablecimientoEducacional;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class EstablecimientosExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $estudiantes = EstablecimientoEducacional::with(['psd'])->orderBy('psd_id', 'ASC')->get();

        return view('admin.informacion_psd.estudiantes', compact('estudiantes'));
    }
}
