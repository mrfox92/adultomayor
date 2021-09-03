<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmIngreso extends Model
{

    protected $table = 'am_ingreso';
    protected $fillable = ['am_id', 'ingreso_id'];

    public function ingreso () {
        return $this->belongsTo(Ingreso::class, 'ingreso_id');
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id');
    }
}
