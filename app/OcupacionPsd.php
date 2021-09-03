<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OcupacionPsd extends Model
{

    protected $table = 'ocupacion_psd';
    protected $fillable = ['psd_id', 'ocupacion_id'];

    public function psd() {
        return $this->belongsTo(PersonaDiscapacitada::class);
    }

    public function ocupacion () {
        return $this->belongsTo(Ocupacion::class);
    }
}
