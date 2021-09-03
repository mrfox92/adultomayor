<?php

namespace App\Exports;

use App\BeneficioEstatalPsd;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class BeneficiosPsdExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $psd = BeneficioEstatalPsd::with(['psd','beneficioEstatal'])->get();
        $beneficios = $psd->groupBy('beneficio_estatal_id');

        return view('admin.informacion_psd.beneficios', compact('beneficios'));
    }

    

}
