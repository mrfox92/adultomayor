<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmActividad extends Model
{
    public function actividad () {
        return $this->belongsTo(Actividad::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }

}
