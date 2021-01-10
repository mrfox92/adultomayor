<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmEtnia extends Model
{
    public function etnia () {
        return $this->belongsTo(Etnia::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }
}
