<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitucionSalud extends Model
{
    protected $table = 'institucion_salud';
    
    public function adultosMayores () {
        return $this->hasMany(AdultoMayor::class);
    }
}
