<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmTaller extends Model
{
    // taller
    public function taller () {
        return $this->belongsTo(Taller::class);
    }

    //  am
    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }
}
