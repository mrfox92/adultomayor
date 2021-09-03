<?php

namespace App\Exports;

use App\DiscapacidadPsd;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DiscapacidadPsdExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $psd = DiscapacidadPsd::with(['psd','tipoDiscapacidad'])->orderBy('tipo_discapacidad_id', 'ASC')->get();
        $discapacidades = $psd->groupBy('id_tipo_discapacidad');

        return view('admin.informacion_psd.discapacidades', compact('discapacidades'));
    }
}
