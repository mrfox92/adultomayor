<?php

namespace App\Exports;

use App\Independiente;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class IndependientesExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $independientes = Independiente::with(['psd'])->orderBy('psd_id', 'ASC')->get();

        return view('admin.informacion_psd.independientes', compact('independientes'));
    }
}
