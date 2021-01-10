<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discapacidad extends Model
{

    protected $table = 'discapacidad';

    public function tipoDiscapacidad () {
        return $this->belongsTo(TipoDiscapacidad::class);
    }

    public function adultosMayoresDiscapacidades () {
        return $this->hasMany(AmDiscapacidad::class);
    }
}
