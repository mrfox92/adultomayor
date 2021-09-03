<?php

namespace App\Exports;

use App\AmPrograma;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ProgramasExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AmPrograma::with(['programa','adultoMayor'])->get();
        $programas = $adultosmayores->groupBy('programa_id');

        return view('admin.informacion_am.programas', compact('programas'));
    }
}
