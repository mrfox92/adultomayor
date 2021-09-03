<?php

namespace App\Exports;

use App\DiscapacidadAm;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DiscapacidadesAmExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = DiscapacidadAm::with(['tipoDiscapacidad','adultomayor'])->orderBy('id_tipo_discapacidad', 'ASC')->get();
        $discapacidades = $adultosmayores->groupBy('id_tipo_discapacidad');

        return view('admin.informacion_am.discapacidades', compact('discapacidades'));
    }
}
