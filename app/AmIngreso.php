<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmIngreso extends Model
{
    public function ingreso () {
        return $this->belongsTo(Ingreso::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }
}
