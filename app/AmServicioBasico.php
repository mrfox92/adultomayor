<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmServicioBasico extends Model
{
    public function servicioBasico () {
        return $this->belongsTo(ServicioBasico::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }

}
