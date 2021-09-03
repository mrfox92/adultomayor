<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeneficioEstatalPsd extends Model
{
    protected $table = 'beneficio_estatal_psd';
    protected $fillable = ['psd_id', 'beneficio_estatal_id'];

    public function psd() {
        return $this->belongsTo(PersonaDiscapacitada::class, 'psd_id');
    }

    public function beneficioEstatal () {
        return $this->belongsTo(BeneficioEstatal::class, 'beneficio_estatal_id');
    }

}
