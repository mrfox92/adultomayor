<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmTrabajoBano extends Model
{
    public function trabajoBano () {
        return $this->belongsTo(TrabajoBano::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }

}
