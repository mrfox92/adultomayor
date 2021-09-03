<?php

namespace App\Exports;

use App\AmTaller;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TalleresAMExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AmTaller::with(['taller','adultoMayor'])->get();
        $talleres = $adultosmayores->groupBy('taller_id');

        return view('admin.informacion_am.talleres', compact('talleres'));
    }
}
