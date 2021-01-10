<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioBasico extends Model
{
    protected $table = 'servicios_basicos';
    
    public function adultosMayoresServiciosBasicos () {
        return $this->hasMany(AmServicioBasico::class);
    }
    
}
