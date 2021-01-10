<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmDiscapacidad extends Model
{
    public function discapacidad () {
        return $this->belongsTo(Discapacidad::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }


}
