<?php

namespace App\Exports;

use App\AmAyudaTecnica;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AyudasTecnicasExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AmAyudaTecnica::with(['ayudaTecnica','adultoMayor'])->get();
        $ayudastecnicas = $adultosmayores->groupBy('ayuda_tecnica_id');

        return view('admin.informacion_am.ayudas_tecnicas', compact('ayudastecnicas'));
    }
}
