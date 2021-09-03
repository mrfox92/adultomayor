<?php

namespace App\Exports;

use App\OrganizacionPsd;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DependientesExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $dependientes = OrganizacionPsd::with(['psd'])->orderBy('psd_id', 'ASC')->get();

        return view('admin.informacion_psd.dependientes', compact('dependientes'));
    }
}
