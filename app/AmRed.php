<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmRed extends Model
{
    public function red () {
        return $this->belongsTo(Red::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }
}
