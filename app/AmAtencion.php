<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmAtencion extends Model
{
    public function atencion () {
        return $this->belongsTo(Atencion::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }

}
