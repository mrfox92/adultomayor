<?php

namespace App\Exports;

use App\AmEtnia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class EtniasAMExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adultosmayores = AmEtnia::with(['etnia','adultoMayor'])->get();
        $etnias = $adultosmayores->groupBy('etnia_id');

        return view('admin.informacion_am.etnias', compact('etnias'));
    }
}
