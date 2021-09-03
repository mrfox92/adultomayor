<?php

namespace App\Exports;

use App\AdultoMayor;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AMExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        $adultosmayores = AdultoMayor::with(['nacionalidad'])->get();
        $nacionalidades = $adultosmayores->groupBy('nacionalidad_id');

        return view('admin.informacion_am.nacionalidades', compact('nacionalidades'));
    }
}
