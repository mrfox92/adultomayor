<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmPatologia extends Model
{
    public function patologia () {
        return $this->belongsTo(Patologia::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }
}
