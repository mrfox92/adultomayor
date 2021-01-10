<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmAyudaTecnica extends Model
{
    public function ayudaTecnica () {
        return $this->belongsTo(AyudaTecnica::class);
    }

    public  function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }
}
