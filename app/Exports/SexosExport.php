<?php

namespace App\Exports;

use App\AdultoMayor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class SexosExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\FromView
    */
    public function view(): View
    {
        $adultosmayores = AdultoMayor::with(['nacionalidad'])->get();
        $sexos = $adultosmayores->groupBy('sexo');

        return view('admin.informacion_am.sexos', compact('sexos'));
    }
}
