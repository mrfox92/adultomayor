<?php

namespace App\Exports;

use App\OtraOcupacionPsd;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class OtraOcupacionExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $otras = OtraOcupacionPsd::with(['psd'])->orderBy('psd_id', 'ASC')->get();

        return view('admin.informacion_psd.otras', compact('otras'));
    }
}
