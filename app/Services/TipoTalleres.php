<?php

namespace App\Services;

use App\TipoTaller;

class TipoTalleres
{
    public function get()
    {
        $tipoTalleres = TipoTaller::get();
        $tipoTalleresArray [''] = 'Selecciona un tipo taller';
        foreach ($tipoTalleres as $tipoTaller) {
            $tipoTalleresArray[$tipoTaller->id] = $tipoTaller->nombre;
        }

        return $tipoTalleresArray;
    }
}